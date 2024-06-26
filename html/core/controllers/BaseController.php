<?php

namespace core\controllers;

class BaseController {

    public function __construct($title=null) {

        #OWASP SECURITY - CRSF TOKEN
        if(!validateCsrfToken()) redirect(LOGIN_PAGE);

        #OWASP SECURITY - CONTENT-SECURITY-POLICY
        //header("Content-Security-Policy: default-src 'self' ".BASE_URL);

        if($title) title(MAIN_PAGE_TITLE." - $title");
    }
}
