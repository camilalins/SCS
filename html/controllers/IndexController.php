<?php
namespace controllers;

use core\controllers\BaseController;

/**
 * @Route()
 */
class IndexController extends BaseController {

    public function get(){

        redirect(LOGIN_PAGE);
    }

}
