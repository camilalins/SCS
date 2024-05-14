<?php
namespace controllers\login;

use core\controllers\BaseController;

/**
 * @Route("logout")
 */
class EncerrarSessaoController extends BaseController {

    public function get(){

        session_destroy();
        redirect(LOGIN_PAGE);
    }

}
