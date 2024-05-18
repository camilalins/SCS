<?php

namespace core\controllers;

class BaseController {

    public function __construct($title=null) {

        #OWASP SECURITY - CRSF TOKEN
        if(!validateCsrfToken()) redirect(LOGIN_PAGE);

        #OWASP SECURITY - CONTENT-SECURITY-POLICY
        //header("Content-Security-Policy: default-src 'self' http://localhost:8080/");

        if($title) title(MAIN_PAGE_TITLE." - $title");
    }
}
