<?php
namespace controllers\api\clientes;

use core\controllers\security\ApiAuthorizedController;
use models\Cliente;
use models\cliente\Status;
use Exception;
use repo\ClienteRepositorio;

/**
 * @Route("/api/clientes")
 */
class PesquisarClienteController extends ApiAuthorizedController {

    public function get() {

        response("Method not allowed", 405);
    }

    public function post() {

        try {
            $body = body();

            if(!$body->nome && !$body->cnpj && !$body->email) throw new Exception();

            $repo = new ClienteRepositorio();
            $clientes = $repo->obterPor([
                "nome" => like($body->nome),
                "cnpj" => $body->cnpj,
                "email" => like($body->email),
                "status" => Status::Ativo
            ], 50);
        }
        catch (Exception) { $clientes = []; }

        response(Cliente::toObjectArray($clientes));
    }

    public function put() {

        response("Not implemented", 501);
    }

    public function delete() {

        response("Not implemented", 501);
    }

}