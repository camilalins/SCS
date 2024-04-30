<?php
namespace repositorios;

require_once "../config/const.php";

use mysqli;

class SolicitacaoRepositorio {

    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASS,
            MYSQL_DATABASE,
            MYSQL_PORT
        ) or throw new \Exception("Não foi possível conectar"); //$this->mysqli->connect_error
    }

    public function obterTodos() {

        $result = $this->mysqli->query("SELECT * from solicitacao");

        while ($row = $result->fetch_object()) $solicitacoes[] = $row;

        $this->mysqli -> close();

        return $solicitacoes;
    }

    public function obterPorId($id) {

        $id = $this->mysqli->real_escape_string($id);

        $stmt = $this->mysqli->prepare("SELECT * FROM solicitacao WHERE id = ?");
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($solicitacao = $result->fetch_object())
            return $solicitacao;

        return null;
    }

    /**
     * Criar nova solicitacao
     *
     * @throws Exception caso cliente ou placa vazios
     */
    public function criar($dto) {

        if (!$dto->data || !$dto->cliente || !$dto->placa)
            throw new \Exception('Informe os dados obrigatórios');

        $sql = "INSERT INTO solicitacao (data, cliente, placa) VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sss', $dto->data, $dto->cliente, $dto->placa);
        $stmt->execute();

        if($this->mysqli->insert_id > 0)
            return $this->obterPorId($this->mysqli->insert_id);

        $stmt->close();
        $this->mysqli->close();

        return null;
    }
}