<?php
namespace controllers\login;

include_once "../core/BaseController.php";

class EncerrarSessaoController extends \controllers\core\BaseController {

    public function get(){

        session_destroy();
        redirect(LOGIN);
    }

} new EncerrarSessaoController();
