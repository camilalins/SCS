<?php
namespace repo;

use core\repo\Repositorio;
use models\Cliente;
use models\Usuario;

class ClienteRepositorio extends Repositorio {

    public function __construct() {
        parent::__construct(Cliente::class);
    }


}