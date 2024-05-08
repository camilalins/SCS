<?php
namespace controllers\login;

require_once "core/controllers/BaseController.php";

/**
 * @Route("login/encerrar-sessao")
 */
class EncerrarSessaoController extends \core\controllers\BaseController {

    public function get(){

        session_destroy();
        redirect(LOGIN_PAGE);
    }

}
