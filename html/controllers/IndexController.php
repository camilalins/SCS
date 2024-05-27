<?php
namespace controllers;

use core\controllers\BaseController;

/**
 * @Route()
 */
class IndexController extends BaseController {

    /**
     * @Get()
     */
    public function get(){

        redirect(LOGIN_PAGE);
    }

    /**
     * @Get("/204")
     */
    public function indisponivel(){

        viewCustom("general.php", NO_CONTENT_204);
    }

}
