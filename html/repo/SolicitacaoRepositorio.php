<?php
namespace repo;

use core\repo\Repositorio;
use models\Solicitacao;

class SolicitacaoRepositorio extends Repositorio {

    public function __construct() {
        parent::__construct(Solicitacao::class);
    }

    /**
     * Buscar solicitacoes com dados de clientes
     *
     * @param $nome Nome do cliente
     * @return Array
     * @throws Exception Erro de acesso ao banco de dados
     */
    public function obterPorFiltro(string $dto): array {

        $solicitacoes = $this->obterPor($dto);

        return $solicitacoes;
    }
}