<?php

namespace controllers\login;

use core\controllers\BaseController;
use repo\UsuarioRepositorio;

/**
 * @Route("login")
 */
class EfetuarLoginController extends BaseController {

    /**
     * @Get()
     */
    public function index(){

        if(user()) redirect(HOME_PAGE);

        view("login/login.php");
    }

    /**
     * @Post()
     */
    public function efetuarLogin() {

        try {
            $email = body("email");
            $senha = body("senha");

            if(!$email || !$senha)
                throw new \Exception(sys_messages(MSG_VALID_ERR_A001));

            $repo = new UsuarioRepositorio();
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
