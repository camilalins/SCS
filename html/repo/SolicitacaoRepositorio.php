<?php

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
        ) or throw new Exception("Não foi possível conectar"); //$this->mysqli->connect_error
    }

    public function obterTodos() {

        $result = $this->mysqli->query("SELECT * from solicitacao");

        while ($row = $result->fetch_object()) $solicitacoes[] = $row;

        $this->mysqli -> close();

        return $solicitacoes;
    }
    /**
     * Criar solicitacao
     * @throws Exception caso cliente ou placa vazios
     */
    public function criar($solicitacao) {

        if (!$solicitacao->data || !$solicitacao->cliente || !$solicitacao->placa)
            throw new Exception('Informe os dados obrigatórios');

        $sql = "INSERT INTO solicitacao (data, cliente, placa) VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sss', $solicitacao->data, $solicitacao->cliente, $solicitacao->placa);
        $stmt->execute();

        $stmt->close();
        $this->mysqli->close();

        return true;
    }
}