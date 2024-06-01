<?php
namespace controllers\solicitacoes;

use core\controllers\security\AuthorizedController;
use repo\SolicitacaoRepositorio;

/**
 * @Route("/solicitacoes")
 */
class SolicitacaoController extends AuthorizedController {

    /**
     * @Get()
     */
    public function index() {

        view("solicitacoes/pesquisa.php");
    }


    /**
     * @Post()
     */
    public function pesquisar() {

        try {

            $body = body();

            if(!$body->data && !$body->cliente && !$body->placa) throw new \Exception();

            $repo = new SolicitacaoRepositorio();
            $clientes = $repo->obterPor([
                "data" => like($body->data),
                "cliente" => like($body->cliente),
                "placa" => like($body->placa)
            ], 50);
        }
        catch (\Exception) { $solicitacoes = []; }

        view("solicitacoes/pesquisa.php", [ "solicitacoes" => $solicitacoes ]);
    }

    /**
     * @Get("/form")
     */
    public function form(){

        view("solicitacoes/cadastro.php", [ "modal" => query("modal") ]);
    }

}
