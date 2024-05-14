<?php
namespace controllers\login;

/**
 * @Route("logout")
 */
class EncerrarSessaoController extends \core\controllers\BaseController {

    public function get(){

        session_destroy();
        redirect(LOGIN_PAGE);
    }

}
