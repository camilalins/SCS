<?php
namespace controllers\login;

require_once "core/controllers/BaseController.php";

/**
 * @Route("logout")
 */
class EncerrarSessaoController extends \core\controllers\BaseController {

    public function get(){

        session_destroy();
        redirect(LOGIN_PAGE);
    }

}
