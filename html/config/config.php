<?php

# DATABASE SETTINGS
const MYSQL_HOST = "host.docker.internal";
const MYSQL_USER = "scs";
const MYSQL_PASS = 'Siop@2024';
const MYSQL_DATABASE = "scs";
const MYSQL_PORT = "3336";
const MYSQL_SCHEMA = "scs";

# SMTP SETTINGS
const MAIL_SMTP = "smtp.dreamhost.com";
const MAIL_SMTP_NAME = "SIOP";
const MAIL_SMTP_USER = "camila.lins@inteligenciasiop.com";
const MAIL_SMTP_PASS = "firegirl*20";
const MAIL_SMTP_CRYPTO = "tls/ssl";
const MAIL_SMTP_PORT = "465";

# SESSION
const SESSION_TIMEOUT=600; //10 minutes

# DEFAULT VARS
const USER = "USER";
const LOGIN_PAGE = "/login";
const HOME_PAGE = "/home";
const DEF_LANG = "pt-BR";

# MAIN LAYOUT
const MAIN_PAGE = "main";
const MAIN_PAGE_EXCLUDES = [ "login/login.php", "login/recuperar-senha.php" ];
const MAIN_PAGE_TITLE = "SCS";

# MOCKUP
const MOCKUP_MODE = 0;
const MOCKUP_ROOT = "mockup/login/login.html";

# DEBUG SETTINGS
const DEBUG_MODE = 1;
const DEBUG_LEVEL_LOW = "low";
const DEBUG_LEVEL_HIGH = "high";
const DEBUG_LEVEL = DEBUG_LEVEL_HIGH;

# DEBUG QUERY SETTINGS
const DEBUG_QUERY = 1;
const DEBUG_QUERY_LEVEL_SELECT = "SELECT";
const DEBUG_QUERY_LEVEL_UPDATE = "UPDATE";
const DEBUG_QUERY_LEVEL_ALL = "ALL";
const DEBUG_QUERY_LEVEL = DEBUG_QUERY_LEVEL_ALL;


