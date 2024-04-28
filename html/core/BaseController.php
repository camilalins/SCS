<?php

namespace controllers\core;

include_once "../config/const.php";
include_once "../http/helpers.php";

class BaseController {

    public function __construct() {
        if($_SERVER["REQUEST_METHOD"] == "GET") { $this->get(); }
        if($_SERVER["REQUEST_METHOD"] == "POST") { $this->post(); }
    }
}
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
