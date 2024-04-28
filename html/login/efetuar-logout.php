<?php

include_once "../core/BaseController.php";
include_once "../http/helpers.php";

class LogoutController extends BaseController {

    public function get(){

        include "../login/recuperar-senha.php";
    }

    public function post(){

        redirect("/login/recuperar-senha.php");
    }

} new LogoutController();