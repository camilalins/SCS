<?php

namespace controllers\login;

use core\controllers\BaseController;

/**
 * @Route("login")
 */
class EfetuarLoginController extends BaseController {

    public function get(){

        if(user()) redirect(HOME_PAGE);

        view("login/login.php");
    }

    public function post() {

        try {
            $email = body("email");
            $senha = body("senha");

            if(!$email || !$senha)
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->obterPorEmailESenha($email, $senha);

            if(!$usuario)
                throw new \Exception(sys_messages(MSG_LOGIN_ERR_A001));

            authenticate($usuario);

            redirect(HOME_PAGE);
        }
        catch (\Exception $e) {

            view("login/login.php", [ "erro" => $e->getMessage() ]);
        }
    }

}
