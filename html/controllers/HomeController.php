<?php
namespace controllers;

use core\controllers\security\AuthorizedController;

/**
 * @Route("/home")
 */
class HomeController extends AuthorizedController {

    public function __construct() { title(MAIN_PAGE_TITLE." - Página Inicial");  }

    public function get() {

        view("home.php", [ ]);
    }

}
