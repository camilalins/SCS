<?php

namespace core\controllers\security;

use core\controllers\BaseController;

class AuthorizedController extends BaseController {

    public function __construct($title=null) {
        if (!user()) redirect(LOGIN_PAGE);
        parent::__construct($title);
    }
}
