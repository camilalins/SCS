<?php
namespace repo;

use core\repo\Repositorio;
use models\Cliente;

class ClienteRepositorio extends Repositorio {

    public function __construct() {
        parent::__construct(Cliente::class);
    }

}