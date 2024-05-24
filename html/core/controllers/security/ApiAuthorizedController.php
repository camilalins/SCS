<?php

namespace core\controllers\security;

use core\controllers\ApiBaseController;

class ApiAuthorizedController extends ApiBaseController {

    public function __construct() {
        if (!user()) response(UNAUTHORIZED_401);
        parent::__construct();
    }
}
