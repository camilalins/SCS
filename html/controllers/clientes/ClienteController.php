<?php
namespace controllers\clientes;

use core\controllers\security\AuthorizedController;
use repo\ClienteRepositorio;
use models\enums\cliente\Status;

/**
 * @Route("/clientes")
 */
class ClienteController extends AuthorizedController {

    /**
     * @Get()
     */
    public function index() {

        view("clientes/pesquisa.php");
    }

    /**
     * @Post()
     */
    public function pesquisar() {

        try {

            $body = body();

            if(!$body->nome && !$body->cnpj && !$body->email) throw new \Exception();

            $repo = new ClienteRepositorio();
            $clientes = $repo->obterPor([
                "nome" => like($body->nome),
                "cnpj" => $body->cnpj,
                "email" => like($body->email),
                "status" => Status::Ativo
            ], 50);
        }
        catch (\Exception) { $clientes = []; }

        view("clientes/pesquisa.php", [ "clientes" => $clientes ]);
    }

    /**
     * @Get("/form")
     */
    public function form(){

        view("clientes/cadastro.php", [ "modal" => query("modal") ]);
    }

}