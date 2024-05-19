<?php

namespace controllers\login;

use core\controllers\BaseController;

/**
 * @Route("/recuperar-senha")
 */
class RecuperarSenhaController extends BaseController {

    public function get() {
        view("login/recuperar-senha.php");
    }

    public function post() {

        response("Method not allowed", 405);
    }

}
