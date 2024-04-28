<?php
namespace controllers;

include_once "../core/AuthorizedController.php";
require_once "../repo/SolicitacaoRepositorio.php";

class ApresentarController extends \controllers\core\AuthorizedController {

    public function get() {

        $repo = new \repositorios\SolicitacaoRepositorio();
        $solicitacoes = $repo->obterTodos();

        view("solicitacoes/pagina-inicial.php", [ "solicitacoes" => $solicitacoes ]);
    }

    public function post() {

        redirect("login/recuperar-senha.php");
    }

} new ApresentarController();
