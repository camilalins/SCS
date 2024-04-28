<?php

namespace controllers\core;

include_once "../config/const.php";
include_once "../http/helpers.php";
include_once "../utils/date-time.php";

class BaseController {

    public function __construct() {
        if($_SERVER["REQUEST_METHOD"] == "GET") { $this->get(); }
        if($_SERVER["REQUEST_METHOD"] == "POST") { $this->post(); }
    }
}
