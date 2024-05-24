<?php

namespace controllers\login;

use core\controllers\BaseController;

/**
 * @Route("logout")
 */
class EncerrarSessaoController extends BaseController {

    /**
     * @Get()
     */
    public function index(){

        session_destroy();
        redirect(LOGIN_PAGE);
    }
}
