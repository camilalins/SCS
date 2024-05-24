<?php
namespace controllers\clientes;

use core\controllers\security\AuthorizedController;
use PHPMailer\PHPMailer\Exception;
use repo\ClienteRepositorio;
use models\enums\cliente\Status;

/**
 * @Route("/clientes")
 */
class PesquisarClienteController extends AuthorizedController {

    /**
     * @Get()
     */
    public function get() {

        view("clientes/pesquisa.php");
    }

    /**
     * @Post()
     */
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
        catch (\Exception $e) { $clientes = []; }

        view("clientes/pesquisa.php", [ "clientes" => $clientes ] +(array)body());
    }

}