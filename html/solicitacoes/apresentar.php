<?php

include_once "../core/BaseController.php";
include_once "../http/helpers.php";
require_once "../repo/SolicitacaoRepositorio.php";

class ApresentarController extends \controllers\core\BaseController {

    public function __construct() {
        if (!session(USUARIO)) redirect(LOGIN);
        parent::__construct();
    }

    public function get() {

        $repo = new SolicitacaoRepositorio();
        $solicitacoes = $repo->obterTodos();

        view("home/home.php", [ "solicitacoes" => $solicitacoes ]);
    }

    public function post() {

        redirect("login/recuperar-senha.php");
    }

}

new ApresentarController();
