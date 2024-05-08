<?php

# DATABASE SETTINGS
const MYSQL_HOST = "host.docker.internal";
const MYSQL_USER = "scs";
const MYSQL_PASS = 'Siop@2024';
const MYSQL_DATABASE = "scs";
const MYSQL_PORT = "3336";

# SMTP SETTINGS
const MAIL_SMTP = "SEU-SMTP-AQUI";
const MAIL_SMTP_NAME = "SIOP";
const MAIL_SMTP_USER = "SEU-EMAIL@siop.com.br";
const MAIL_SMTP_PASS = "SUA-SENHA";
const MAIL_SMTP_CRYPTO = "tls";
const MAIL_SMTP_PORT = "587";

# DEFAULT VARS
const USER = "USER";
const LOGIN_PAGE = "/login";

# MAIN LAYOUT
const MAIN_PAGE = "main";
const MAIN_PAGE_EXCLUDE = [ "login/login.php", "login/recuperar-senha.php" ];
const MAIN_PAGE_TITLE = "SCS";

# MOCKUP
const MOCKUP_MODE = 0;
const MOCKUP_ROOT = "mockup/login/login.html";

# DEBUG SETTINGS
const DEBUG_MODE = 1;
const DEBUG_LEVEL_LOW = "low";
const DEBUG_LEVEL_HIGH = "high";
const DEBUG_LEVEL = DEBUG_LEVEL_LOW;