<?php
namespace controllers\solicitacoes;

use core\controllers\security\AuthorizedController;

/**
 * @Route("/solicitacoes")
 */
class PesquisarSolicitacaoController extends AuthorizedController {

    public function get() {

        view("solicitacoes/pesquisa.php");
    }

    public function post() {

        $repo = new \repo\SolicitacaoRepositorio();
        $solicitacoes = $repo->obterTodos();

        view("solicitacoes/pesquisa.php", [ "solicitacoes" => $solicitacoes ]);
    }

}
