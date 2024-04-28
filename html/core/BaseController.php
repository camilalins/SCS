<?php

class BaseController {

    public function __construct() {
        if($_SERVER["REQUEST_METHOD"] == "GET") { $this->get(); };
        if($_SERVER["REQUEST_METHOD"] == "POST") { $this->post(); };
    }

}