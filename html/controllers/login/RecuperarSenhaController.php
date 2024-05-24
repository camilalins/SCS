<?php

namespace controllers\login;

use core\controllers\BaseController;

/**
 * @Route("recuperar-senha")
 */
class RecuperarSenhaController extends BaseController {

    /**
     * @Get()
     */
    public function index() {
        view("login/recuperar-senha.php");
    }

}
