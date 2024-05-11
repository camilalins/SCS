<?php
namespace controllers\clientes;

require_once "core/controllers/AuthorizedController.php";
//require_once "repo/ClienteRepositorio.php";

/**
 * @Route("/clientes")
 */
class PesquisarClienteController extends \core\controllers\AuthorizedController {

    public function get() {

        view("clientes/pesquisa.php");
    }

    public function post() {

        $repo = new \repo\ClienteRepositorio();
        $clientes = $repo->obterTodos();

        view("clientes/pesquisa.php", [ "clientes" => $clientes ]);
    }

}
