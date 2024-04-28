<?php

include_once "../core/BaseController.php";
include_once "../http/helpers.php";
//TODO: ADICIONAR IMPORTACAO REPO

class EfetuarLoginController extends BaseController {

    public function get(){

        view("/login/login.php");
    }

    public function post() {

        try {
            $loginCorreto = true; //TODO: USAR REPO E BUSCAR NO BANCO

            if(!$loginCorreto)
                throw new Exception("Login e senha inválidos");

            redirect("/solicitacoes/apresentar.php");
        }
        catch (Exception $e) {

            view("/login/login.php", [ "erro" => $e->getMessage() ]);
        }
    }

} new EfetuarLoginController();