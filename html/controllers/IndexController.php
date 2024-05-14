<?php
namespace controllers;

/**
 * @Route()
 */
class IndexController extends \core\controllers\BaseController {

    public function get(){

        redirect(LOGIN_PAGE);
    }

}
