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

        if(!$class) throw new Error(sys_messages(MSG_REPO_ERR_A001). (DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": ".sys_messages(MSG_REPO_ERR_B001) : ""));

        $this->meta = Entity::metadata($class);
        if($this->meta->class->parent->name != "core\Model") throw new \Error(sys_messages(MSG_REPO_ERR_A002). (DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": ". sys_messages(MSG_REPO_ERR_B002) : ""));
        //if(!in_array("core\Model", $this->meta->class->interfaces)) throw new \Error(sys_messages(MSG_REPO_ERR_A002). (DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": ". sys_messages(MSG_REPO_ERR_B002) : ""));

        $this->mysqli = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASS,
            MYSQL_DATABASE,
            MYSQL_PORT
        ) or throw new Exception(sys_messages(MSG_REPO_ERR_A003). DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": {$this->mysqli->connect_error}" : "");
    }

    /**
     * Obtem todos registros de determinada Entidade
     * @return Model[]
     * @throws Exception
     */
    public function obterTodos():array {

        $sql = "SELECT * from {$this->meta->table->qualifiedName}";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_SELECT || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

        $result = $this->mysqli->query($sql);

        $entidades = [];
        while ($entidade = $result->fetch_object()) $entidades[] = $this->meta->class->qualifiedName::deserialize($entidade);

        $this->mysqli->close();

        return $entidades;
    }

    /**
     * Encontra uma entidade com Id correspondente
     * @param $id Int Id da entidade
     * @return Model|null
     * @throws Exception
     */
    public function obterPorId($id): ?Model {

        $id = $this->mysqli->real_escape_string($id);

        $sql = "SELECT * FROM {$this->meta->table->qualifiedName} WHERE id = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_SELECT || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($entidade = $result->fetch_object())
            return $this->meta->class->qualifiedName::deserialize($entidade);

        return null;
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

        $where = array_map(function ($k, $v) {

            $o = NONE_IF_EMPTY;
            if(gettype($v) == "array") {
                $o = count($v) > 1 ? $v[1] : "";
                $v = $v[0];
            }
            if(gettype($v) == "object" && (new ReflectionClass($v))->isEnum()) $v = $v->value;

            if(str_starts_with(strtoupper($v), "LIKE")) {
                $value = trim(substr($v, 4));
                $valueNoWildcard = str_replace("%", "", $value);
                if($o == NONE_IF_EMPTY && !$valueNoWildcard) return null;
                if($o == NULL_IF_EMPTY && !$valueNoWildcard) return "$k IS NULL";
                if($o == BLANK_IF_EMPTY && !$valueNoWildcard) return "$k = ''";

                return "$k LIKE '$value'";
            }

            if($o == NONE_IF_EMPTY && !$v) return null;
            if($o == NULL_IF_EMPTY && !$v) return "$k IS NULL";
            if($o == BLANK_IF_EMPTY && !$v) return "$k = ''";
            return "$k = '$v'";

        },  $campos, $valores);
        $where = implode(" AND ", array_diff($where, [null]));

        $sql = "SELECT * FROM {$this->meta->table->qualifiedName}";
        if($where) $sql.= " WHERE $where";
        if($limite) $sql.= " LIMIT $limite";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_SELECT || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $results = [];
        while($entidade = $result->fetch_object())
            $results[] = $this->meta->class->qualifiedName::deserialize($entidade);

        return $results;
    }

    /**
     * Criar novo registro
     *
     * @throws Exception
     */
    public function criar($dto=[]) {

        if (!$dto) throw new Exception(sys_messages(MSG_REPO_ERR_A007));

        $dtotype = gettype($dto);
        if($dtotype != "object" && $dtotype != "array") throw new Exception(sys_messages(MSG_REPO_ERR_A004));

        if($dto["id"])  unset($dto["id"]);

        $campos = $dtotype == "object" ? array_keys(get_object_vars($dto)) : array_keys($dto);
        $valores = $dtotype == "object" ? array_values(get_object_vars($dto)) : array_values($dto);

        $joinCampos = implode(", ", $campos);
        $joinParams = implode(", ", array_map(function () { return "?"; }, $valores));
        $joinBinds = implode("", array_map(function () { return "s"; }, $valores));

        $sql = "INSERT INTO {$this->meta->table->qualifiedName} ($joinCampos) VALUES ($joinParams)";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

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

        if(!$dto["id"]) throw new Exception(sys_messages(MSG_REPO_ERR_A009));

        $id = $dto["id"];
        unset($dto["id"]);

        $campos = $dtotype == "object" ? array_keys(get_object_vars($dto)) : array_keys($dto);
        $valores = $dtotype == "object" ? array_values(get_object_vars($dto)) : array_values($dto);

        $valoresEId = array_merge($valores,[$id]);
        $joinSets = implode(", ", array_map(function ($k, $v){ return "$k = ?"; }, $campos, $valores));
        $joinBinds = implode("", array_map(function () { return "s"; }, $valoresEId));

        $sql = "UPDATE {$this->meta->table->qualifiedName} SET $joinSets WHERE id = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

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

        if($dtotype != "integer" && !$dto["id"]) throw new Exception(sys_messages(MSG_REPO_ERR_A006));

        $id = $dtotype != "integer" ? $dto["id"] : $dto;

        $entidades = $this->obterPor([ "id" => $id ]);
        if(!$entidades) throw new Exception(sys_messages(MSG_REPO_ERR_A008));


        $sql = "DELETE FROM {$this->meta->table->qualifiedName} WHERE id = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

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

        $entidades = $this->obterPor($dto);
        if(!$entidades) throw new Exception(sys_messages(MSG_REPO_ERR_A008));

        $campos = $dtotype == "object" ? array_keys(get_object_vars($dto)) : array_keys($dto);
        $valores = $dtotype == "object" ? array_values(get_object_vars($dto)) : array_values($dto);

        $where = array_map(function ($k, $v) {
            if(str_starts_with(strtoupper($v), "LIKE")) {
                return "$k LIKE ?";
            }
            return "$k = ?";
        },  $campos, $valores);

        $joinBinds = implode("", array_map(function () { return "s"; }, $valores));
        $joinWhere = implode(" AND ", $where);

        $sql = "DELETE FROM {$this->meta->table->qualifiedName} WHERE $joinWhere";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param($joinBinds, ...$valores);
        $stmt->execute();

        return $entidades;

        $stmt->close();
        $this->mysqli->close();

        return [];
    }
    /**
     * Atualiza a senha do usuário pelo seu e-mail
     *
     * @param string $email O e-mail do usuário
     * @param string $novaSenha A nova senha do usuário
     * @return bool Retorna true se a senha for atualizada com sucesso, caso contrário, false
     * @throws Exception Se houver um erro ao executar a consulta SQL
     */
    public function atualizarSenha(string $email, string $novaSenha): bool {
        $email = $this->mysqli->real_escape_string($email);

        // Hash da nova senha
        $hashedPassword = password_hash($novaSenha, PASSWORD_BCRYPT);

        $sql = "UPDATE {$this->meta->table->qualifiedName} SET senha = ? WHERE email = ?";
        if(DEBUG_MODE == 1 && DEBUG_QUERY == 1 && (DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_UPDATE || DEBUG_QUERY_LEVEL == DEBUG_QUERY_LEVEL_ALL)) syslog(LOG_ALERT, $sql);

        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        $success = $stmt->affected_rows > 0;

        $stmt->close();

        return $success;
    }
}