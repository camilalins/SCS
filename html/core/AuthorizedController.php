<?php

namespace controllers\core;

include_once "../core/BaseController.php";

class AuthorizedController extends \controllers\core\BaseController {

    public function __construct() {
        if (!session(USUARIO)) redirect(LOGIN_PAGE);
        parent::__construct();
    }
}
