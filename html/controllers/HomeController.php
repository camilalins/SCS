<?php
namespace controllers;

require_once "core/controllers/AuthorizedController.php";

/**
 * @Route("/home")
 */
class HomeController extends \core\controllers\AuthorizedController {

    public function get() {

        title(MAIN_PAGE_TITLE." - Página Inicial");

        view("home.php", [ ]);
    }

}
