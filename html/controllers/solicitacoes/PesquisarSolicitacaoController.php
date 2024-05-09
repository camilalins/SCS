<?php
namespace controllers\solicitacoes;

require_once "core/controllers/AuthorizedController.php";
require_once "repo/SolicitacaoRepositorio.php";

/**
 * @Route("/solicitacoes")
 */
class PesquisarSolicitacaoController extends \core\controllers\AuthorizedController {

    public function get() {

        view("solicitacoes/pesquisa.php");
    }

    public function post() {

        $repo = new \repo\SolicitacaoRepositorio();
        $solicitacoes = $repo->obterTodos();

        view("solicitacoes/pesquisa.php", [ "solicitacoes" => $solicitacoes ]);
    }

}
