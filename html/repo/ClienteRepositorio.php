<?php
namespace repo;

use core\repo\Repositorio;
use models\Cliente;

class ClienteRepositorio extends Repositorio {

    public function __construct() {
        parent::__construct(Cliente::class);
    }

    /**
     * Buscar ids pelo nome
     *
     * @param $nome Nome do cliente
     * @return Array
     * @throws Exception Erro de acesso ao banco de dados
     */
    public function obterIdsPorNome(string $nome): array {

        $nome = $this->mysqli->real_escape_string($nome);

        $stmt = $this->mysqli->prepare("SELECT * FROM cliente WHERE nome like ?");
        $sNome = "%$nome%";
        $stmt->bind_param("s", $sNome);
        $stmt->execute();
        $result = $stmt->get_result();

        $clientes = [];
        while($entidade = $result->fetch_object())
            $clientes[] = Cliente::deserialize($entidade);

        $clienteIds = array_reduce($clientes, function ($carry, $item) {
            $carry[] = $item->getId();
            return $carry;
        }, []);

        return $clienteIds;
    }

}