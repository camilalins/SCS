<?php
namespace controllers\login;

use Exception;

include_once "../core/BaseController.php";
include_once "../repo/UsuarioRepositorio.php";

class EfetuarLoginController extends \controllers\core\BaseController {

    public function get(){

        view("login/login.php");
    }

    public function post() {

        try {
            $email = body("email");
            $senha = body("senha");

            $repo = new \repositorios\UsuarioRepositorio();
            $usuario = $repo->buscarPorEmailESenha($email, $senha);

            if(!$usuario)
                throw new Exception("Login e/ou senha inválidos");

            session(USUARIO, $usuario);

            redirect("solicitacoes/apresentar.php");
        }
        catch (Exception $e) {

            view("login/login.php", [ "erro" => $e->getMessage() ]);
        }
    }

} new EfetuarLoginController();
