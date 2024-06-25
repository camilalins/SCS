<?php
namespace core\repo;

use core\Entity;
use core\Model;
use Error;
use Exception;
use ReflectionClass;
use mysqli;

class Repositorio {

    protected $meta;
    protected $mysqli;

    /**
     * @param $class String|null Classe de Model
     * @throws Exception
     */
    public function __construct(string $class=null) {

        if(!$class) throw new Error(sys_messages(MSG_REPO_ERR_A001, MSG_REPO_ERR_B001));

        $this->meta = Entity::metadata($class);
        if($this->meta->class->parent->name != "core\Model") throw new \Error(sys_messages(MSG_REPO_ERR_A002, MSG_REPO_ERR_B002));

        $this->mysqli = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASSWORD,
            MYSQL_DATABASE,
            MYSQL_PORT?:3306
        ) or throw new Exception(sys_messages(MSG_REPO_ERR_A003, $this->mysqli->connect_error));
    }

    /**
     * Obtem todos registros de determinada Entidade
     * @return Model[]
     * @throws Exception
     */
    public function obterTodos():array {

        return $this->obterPor([]);
    }

    /**
     * Encontra uma entidade com Id correspondente
     * @param $id Int Id da entidade
     * @return Model|null
     * @throws Exception
     */
    public function obterPorId($id): ?Model {

        return $this->obterPrimeiro([ "id" => $this->mysqli->real_escape_string($id) ]);
    }

    /**
     * Buscar com filtro dinâmico
     * @return Model[]
     * @throws Exception
     */
    public function obterPor($dto=[], $limite=0):array {

        if (!$dto) throw new Exception(sys_messages(MSG_REPO_ERR_A010));

        $dtotype = gettype($dto);
        if($dtotype != "object" && $dtotype != "array") throw new Exception(sys_messages(MSG_REPO_ERR_A004));

        $campos = $dtotype == "object" ? array_keys(get_object_vars($dto)) : array_keys($dto);
        $valores = $dtotype == "object" ? array_values(get_object_vars($dto)) : array_values($dto);

        $columns = " * ";
        if($joins = Entity::mapRelationship($this->meta->class->qualifiedName))
            $columns = Entity::parseJoinColumns($this->meta);

        $isJoined = isset($joins);
        $mainTable = $this->meta->table->name;

        $where = array_map(function ($k, $v) use($isJoined, $mainTable) {

            $t = $isJoined && !str_contains($k, ".") ? $mainTable."." : "";

            if($c = Entity::mapColumn($this->meta->class->qualifiedName, $k)) $k = $c;

            $o = NONE_IF_EMPTY;
            if(gettype($v) == "array") {
                $o = count($v) > 1 ? $v[1] : "";
                $v = $v[0];
            }
            if(gettype($v) == "object" && (new ReflectionClass($v))->isEnum()) $v = $v->value;

            # IN
            if($v && str_starts_with(strtoupper($v), "IN")) {
                $value = trim(substr($v, 3));
                return "{$t}$k IN $value";
            }

            # LIKE
            if($v && str_starts_with(strtoupper($v), "LIKE")) {
                $value = trim(substr($v, 4));
                $valueNoWildcard = str_replace("%", "", $value);
                if($o == NONE_IF_EMPTY && !$valueNoWildcard) return null;
                if($o == NULL_IF_EMPTY && !$valueNoWildcard) return "{$t}$k IS NULL";
                if($o == BLANK_IF_EMPTY && !$valueNoWildcard) return "{$t}$k = ''";

                return "{$t}$k LIKE '$value'";
            }
            # EQUALS (=)
            if($o == NONE_IF_EMPTY && !$v) return null;
            if($o == NULL_IF_EMPTY && !$v) return "{$t}$k IS NULL";
            if($o == BLANK_IF_EMPTY && !$v) return "{$t}$k = ''";
            return "{$t}$k = '$v'";

        },  $campos, $valores);
        $where = implode(" AND ", array_diff($where, [null]));

        $from = "\nFROM {$this->meta->table->qualifiedName}";

        $sql = "SELECT $columns $from";

        if($joins) $sql.= "\n$joins";
        if($where) $sql.= "\nWHERE $where";
        if($limite) $sql.= gettype($limite) == "array" ? "\nLIMIT {$limite[0]},{$limite[1]}" : "\nLIMIT $limite";

        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, str_replace(PHP_EOL, " ", $sql));

        try {
            $stmt = $this->mysqli->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            $results = [];
            while ($entidade = $result->fetch_object())
                $results[] = $this->meta->class->qualifiedName::deserialize($entidade);

            return $results;
        }
        catch (\Exception $e) {
            if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $e->getMessage());
            return [];
        }
    }

    /**
     * Buscar com filtro dinâmico
     * @return Model|null
     * @throws Exception
     */
    public function obterPrimeiro($dto=[]):?Model {

        $primeiro = $this->obterPor($dto, 1);
        return $primeiro ? current($primeiro) : null;
    }

    /**
     * Criar novo registro
     *
     * @throws Exception
     */
    public function criar($dto=[]) {

        if (!$dto) throw new Exception(sys_messages(MSG_REPO_ERR_A007));

        $meta = Entity::metadata($dto);
        $dtotype = gettype($dto);
        if($dtotype != "object" && $dtotype != "array") throw new Exception(sys_messages(MSG_REPO_ERR_A004));
        if($dtotype == "object") $dto = json_decode(json_encode($dto), true);

        if($dto["id"]) unset($dto["id"]);

        $campos = $meta ? Entity::parseColumnsKeys($meta) : array_keys($dto);
        $valores = $meta ? Entity::parseColumnsValues($meta, $dto) : array_map(function ($v) { return gettype($v) == "object" && (new ReflectionClass($v))->isEnum() ? $v->value : $v; }, array_values($dto));

        $joinCampos = implode(", ", array_map(function ($k) { if($c = Entity::mapColumn($this->meta->class->qualifiedName, $k)) $k = $c; return $k; }, $campos));
        $joinParams = implode(", ", array_map(function () { return "?"; }, $valores));
        $joinBinds = implode("", array_map(function () { return "s"; }, $valores));

        $sql = "INSERT INTO {$this->meta->table->qualifiedName} ($joinCampos) VALUES ($joinParams)";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql." [$joinBinds]");

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param($joinBinds, ...$valores);
        $stmt->execute();

        if($this->mysqli->insert_id > 0)
            return $this->obterPorId($this->mysqli->insert_id);

        $stmt->close();
        $this->mysqli->close();

        return null;
    }

    /**
     * Atualizar registro existente
     *
     * @throws Exception
     */
    public function atualizar($dto=[]) {

        if (!$dto) throw new Exception(sys_messages(MSG_REPO_ERR_A007));

        $dtotype = gettype($dto);
        if($dtotype != "object" && $dtotype != "array") throw new Exception(sys_messages(MSG_REPO_ERR_A004));
        if($dtotype == "object") $dto = json_decode(json_encode($dto), true);

        if(!$dto["id"]) throw new Exception(sys_messages(MSG_REPO_ERR_A009));

        $id = $dto["id"];
        unset($dto["id"]);

        $campos = array_keys($dto);
        $valores = array_values($dto);
        $valores = array_map(function ($v) { return gettype($v) == "object" && (new ReflectionClass($v))->isEnum() ? $v->value : $v; }, $valores);

        $valoresEId = array_merge($valores,[$id]);
        $joinSets = implode(", ", array_map(function ($k, $v){ if($c = Entity::mapColumn($this->meta->class->qualifiedName, $k)) $k = $c; return "$k = ?"; }, $campos, $valores));
        $joinBinds = implode("", array_map(function () { return "s"; }, $valoresEId));

        $sql = "UPDATE {$this->meta->table->qualifiedName} SET $joinSets WHERE id = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql." ".json_encode($valores));

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param($joinBinds, ...$valoresEId);
        $stmt->execute();

        return $this->obterPorId($id);

        $stmt->close();
        $this->mysqli->close();

        return null;
    }

    /**
     * Remover diversos registros existentes
     * @return Model[]
     * @throws Exception
     */
    public function remover($dto=[]):array {

        if (!$dto) throw new Exception(sys_messages(MSG_REPO_ERR_A007));

        $dtotype = gettype($dto);
        if($dtotype != "object" && $dtotype != "array" && $dtotype != "integer") throw new Exception(sys_messages(MSG_REPO_ERR_A005));
        if($dtotype == "object") $dto = json_decode(json_encode($dto), true);

        if($dtotype != "integer" && !$dto["id"]) throw new Exception(sys_messages(MSG_REPO_ERR_A006));

        $id = $dtotype != "integer" ? $dto["id"] : $dto;

        $entidades = $this->obterPor([ "id" => $id ]);
        if(!$entidades) throw new Exception(sys_messages(MSG_REPO_ERR_A008));


        $sql = "DELETE FROM {$this->meta->table->qualifiedName} WHERE id = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql." ".json_encode(["id" => $id]));

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        return $entidades;

        $stmt->close();
        $this->mysqli->close();

        return [];
    }

    /**
     * Remover diversos registros existentes
     *
     * @throws Exception
     */
    public function removerPor($dto=[]):array {

        if (!$dto) throw new Exception(sys_messages(MSG_REPO_ERR_A007));

        $dtotype = gettype($dto);
        if($dtotype != "object" && $dtotype != "array") throw new Exception(sys_messages(MSG_REPO_ERR_A004));
        if($dtotype == "object") $dto = json_decode(json_encode($dto), true);

        $entidades = $this->obterPor($dto);
        if(!$entidades) throw new Exception(sys_messages(MSG_REPO_ERR_A008));

        $campos = array_keys($dto);
        $valores = array_values($dto);
        $valores = array_map(function ($v) { return gettype($v) == "object" && (new ReflectionClass($v))->isEnum() ? $v->value : $v; }, $valores);

        $where = array_map(function ($k, $v) {

            if($c = Entity::mapColumn($this->meta->class->qualifiedName, $k)) $k = $c;

            if(str_starts_with(strtoupper($v), "LIKE")) {
                return "$k LIKE ?";
            }
            return "$k = ?";
        },  $campos, $valores);

        $joinBinds = implode("", array_map(function () { return "s"; }, $valores));
        $joinWhere = implode(" AND ", $where);

        $sql = "DELETE FROM {$this->meta->table->qualifiedName} WHERE $joinWhere";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql." ".json_encode($valores));

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param($joinBinds, ...$valores);
        $stmt->execute();

        return $entidades;

        $stmt->close();
        $this->mysqli->close();

        return [];
    }
}