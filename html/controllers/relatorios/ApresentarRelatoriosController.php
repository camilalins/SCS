<?php

namespace controllers\relatorios;

use core\controllers\security\AuthorizedController;

/**
 * @Route("relatorio")
 */
class ApresentarRelatoriosController extends AuthorizedController {

    public function get(){

        if(user()) redirect(HOME_PAGE);

        view("relatorios/dashboard.php");
    }

    public function post() {

        try {
            $email = body("email");
            $senha = body("senha");

            if(!$email || !$senha)
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $repo = new \repo\UsuarioRepositorio();
            $usuario = $repo->buscarPorEmailESenha($email, $senha);

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
