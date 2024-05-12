<?php
namespace repo;

use mysqli;

class ClienteRepositorio {

    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli(
            MYSQL_HOST,
            MYSQL_USER,
            MYSQL_PASS,
            MYSQL_DATABASE,
            MYSQL_PORT
        ) or throw new \Exception("Não foi possível conectar". DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": {$this->mysqli->connect_error}" : "");
    }

    public function obterTodosClientes() {

        $result = $this->mysqli->query("SELECT * from cliente");

        while ($row = $result->fetch_object()) $clientes[] = $row;

        $this->mysqli -> close();

        return $clientes;
    }
    public function obterPorNome() {

        $result = $this->mysqli->query("SELECT * FROM cliente WHERE nome = ?");

        while ($row = $result->fetch_object()) $nome[] = $row;

        $this->mysqli -> close();

        return $nome;
    }
    public function buscarClientesPorNome($nome) {
        $nome = $this->mysqli->real_escape_string($nome);
        $stmt = $this->mysqli->prepare("SELECT * FROM cliente WHERE nome = ?");
        $stmt->bind_param("n", $nome);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($clientenome = $result->fetch_object())
            return $clientenome;

        return null;
    }


    public function obterPorIdClientes($id) {

        $id = $this->mysqli->real_escape_string($id);

        $stmt = $this->mysqli->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($cliente = $result->fetch_object())
            return $cliente;

        return null;
    }

    /**
     * Criar novo cliente
     *
     * @throws Exception caso campos vazios
     */
    public function criar($dto) {

        if (!$dto->nome || !$dto->cnpj || !$dto->responsavel || !$dto->telefone || !$dto->email)
            throw new \Exception('Informe os dados obrigatórios');

        $sql = "INSERT INTO cliente (nome, cnpj, responsavel, telefone, email) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('sssss', $dto->nome, $dto->cnpj, $dto->responsavel, $dto->telefone, $dto->email);
        $stmt->execute();

        if($this->mysqli->insert_id > 0)
            return $this->obterPorIdClientes($this->mysqli->insert_id);

        $stmt->close();
        $this->mysqli->close();

        return null;
    }
}