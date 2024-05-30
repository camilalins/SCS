<?php
namespace controllers;

use core\controllers\security\AuthorizedController;

/**
 * @Route("/home")
 */
class HomeController extends AuthorizedController {

    public function __construct() { parent::__construct("Página Inicial"); }

    /**
     * @Get()
     */
    public function home() {

        view("home.php");
    }

}
