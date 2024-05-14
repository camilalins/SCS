<?php
namespace controllers\clientes;

use models\Cliente;
use models\cliente\status;

require_once "core/controllers/AuthorizedController.php";
require_once "repo/ClienteRepositorio.php";

/**
 * @Route("/clientes")
 */
class PesquisarClienteController extends \core\controllers\AuthorizedController {

    public function get() {

        view("clientes/pesquisa.php");
    }

    public function post() {

        try {

            $body = body();

            $repo = new \repo\ClienteRepositorio();
            $clientes = $repo->filtrar([
                "nome" => like($body->nome),
                "cnpj" => $body->cnpj,
                "email" => like($body->email),
                "status" => status::ativo
            ], 50);
        }
        catch (\Exception $e) { $clientes = []; }

        view("clientes/pesquisa.php", [ "clientes" => $clientes ] +(array)body());
    }

}