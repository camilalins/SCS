<?php
namespace controllers;

require_once "core/controllers/BaseController.php";

/**
 * @Route()
 */
class IndexController extends \core\controllers\BaseController {

    public function get(){

        redirect(LOGIN_PAGE);
    }

}
