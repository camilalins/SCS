<?php

namespace core\controllers;

require_once "core/controllers/BaseController.php";

class AuthorizedController extends \core\controllers\BaseController {

    public function __construct() {
        if (!user()) redirect(LOGIN_PAGE);
        parent::__construct();
    }
}
