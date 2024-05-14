<?php

namespace core\controllers\security;

use core\controllers\BaseController;

class ApiAuthorizedController extends BaseController {

    public function __construct() {
        if (!user()) response("Unauthorized", 401);
        parent::__construct();
    }
}
