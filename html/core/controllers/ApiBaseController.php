<?php

namespace core\controllers;

class ApiBaseController {

    public function __construct() {

        #OWASP SECURITY - CRSF TOKEN
        if(!validateCsrfToken()) response("Unauthorized", 401);

        #OWASP SECURITY - CONTENT-SECURITY-POLICY
        //header("Content-Security-Policy: default-src 'self' http://localhost:8080/");

    }
}
