<?php

namespace core\controllers;

class ApiBaseController {

    public function __construct() {

        #OWASP SECURITY - CRSF TOKEN
        if(!validateCsrfToken()) response(BAD_REQUEST_400);

        #OWASP SECURITY - CONTENT-SECURITY-POLICY
        //header("Content-Security-Policy: default-src 'self' ".BASE_URL);

    }
}
