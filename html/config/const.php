<?php

# DATABASE SETTINGS
const MYSQL_HOST = "host.docker.internal";
const MYSQL_USER = "scs";
const MYSQL_PASS = 'Siop@2024';
const MYSQL_DATABASE = "scs";
const MYSQL_PORT = "3336";

# SMTP SETTINGS
const MAIL_SMTP = "smtp.dreamhost.com";
const MAIL_SMTP_NAME = "SIOP";
const MAIL_SMTP_USER = "monitoramento@inteligenciasiop.com";
const MAIL_SMTP_PASS = "#SIOP*2024";
const MAIL_SMTP_CRYPTO = "tls";
const MAIL_SMTP_PORT = "587";

# SESSION
const SESSION_TIMEOUT=600; //10 minutes

# DEFAULT VARS
const USER = "USER";
const LOGIN_PAGE = "/login";
const HOME_PAGE = "/home";

# MAIN LAYOUT
const MAIN_PAGE = "main";
const MAIN_PAGE_EXCLUDE = [ "login/login.php", "login/recuperar-senha.php" ];
const MAIN_PAGE_TITLE = "Sistema de Controle de Solicitações";

# MOCKUP
const MOCKUP_MODE = 1;
const MOCKUP_ROOT = "mockup/login/login.html";

# DEBUG SETTINGS
const DEBUG_MODE = 1;
const DEBUG_LEVEL_LOW = "low";
const DEBUG_LEVEL_HIGH = "high";
const DEBUG_LEVEL = DEBUG_LEVEL_LOW;