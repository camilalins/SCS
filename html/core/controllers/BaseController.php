<?php

namespace core\controllers;

class BaseController {

    public function __construct($title=null) {
        if($title) title(MAIN_PAGE_TITLE." - $title");
    }
}
