<?php

namespace controllers\login;

require_once "core/controllers/BaseController.php";
require_once "repo/UsuarioRepositorio.php";

/**
 * @Route("efetuar-login")
 */
class EfetuarLoginController extends \core\controllers\BaseController {

    public function get(){
        view("login/login.php");
    }

    public function post() {

        try {
            $email = body("email");
            $senha = body("senha");

            if(!$email || !$senha)
                throw new \Exception("Preencha os campos obrigatórios");

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->buscarPorEmailESenha($email, $senha);

            if(!$usuario)
                throw new \Exception("Usuário e/ou senha inválidos");

            session(USUARIO, $usuario);

            redirect("home");
        }
        catch (\Exception $e) {

            view("login/login.php", [ "erro" => $e->getMessage() ]);
        }
    }

}
