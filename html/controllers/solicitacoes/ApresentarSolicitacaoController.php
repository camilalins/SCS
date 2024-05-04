<?php
namespace controllers\solicitacoes;

require_once "core/controllers/AuthorizedController.php";
require_once "repo/SolicitacaoRepositorio.php";

/**
 * @Route("/solicitacoes/apresentar")
 */
class ApresentarSolicitacaoController extends \core\controllers\AuthorizedController {

    public function get() {

        $repo = new \repo\SolicitacaoRepositorio();
        $solicitacoes = $repo->obterTodos();

        view("solicitacoes/pagina-inicial.php", [ "solicitacoes" => $solicitacoes ]);
    }

}
