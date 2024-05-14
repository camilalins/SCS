<?php
namespace repo;

use core\repo\Repositorio;
use models\Solicitacao;

class SolicitacaoRepositorio extends Repositorio {

    public function __construct() {
        parent::__construct(Solicitacao::class);
    }
}