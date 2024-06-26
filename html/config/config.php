<?php

# DATABASE SETTINGS
define("MYSQL_HOST", getenv("MYSQL_HOST"));
define("MYSQL_USER", getenv("MYSQL_USER"));
define("MYSQL_PASSWORD", getenv("MYSQL_PASSWORD"));
define("MYSQL_DATABASE", getenv("MYSQL_DATABASE"));
define("MYSQL_PORT", getenv("MYSQL_LOCAL_PORT"));

# LOCALE & TIMEZONE SETTINGS
define("LOCALE", getenv("LOCALE"));
define("TZ", getenv("TZ"));

# SMTP SETTINGS
define("MAIL_SMTP", getenv("MAIL_SMTP"));
define("MAIL_SMTP_NAME", getenv("MAIL_SMTP_NAME"));
define("MAIL_SMTP_USER", getenv("MAIL_SMTP_USER"));
define("MAIL_SMTP_PASSWORD", getenv("MAIL_SMTP_PASSWORD"));
define("MAIL_SMTP_CRYPTO", getenv("MAIL_SMTP_CRYPTO"));
define("MAIL_SMTP_PORT", getenv("MAIL_SMTP_PORT"));
const MAIL_SMTP_ACTIVE = 1;

# SESSION
define("SESSION_TIMEOUT", getenv("SESSION_TIMEOUT"));
define("SESSION_SECRET", getenv("SESSION_SECRET"));

# BASE URL
const BASE_URL = "http://localhost:8080/";

# DEFAULT SESSION USER & TOKEN
const USER = "user";
const TOKEN = "anticrsf";

# DEFAULT PAGES
const LOGIN_PAGE = "/login";
const HOME_PAGE = "/home";

# MAIN LAYOUT
const MAIN_PAGE = "main";
const MAIN_PAGE_EXCLUDES = [ "login/*", "general.php", "clientes/cadastro.php", "solicitacoes/cadastro.php", "solicitacoes/pesquisa-cliente.php", "solicitacoes/forms/*" ];
const MAIN_PAGE_TITLE = "SCS";

# MOCKUP
const MOCKUP_MODE = 0;
const MOCKUP_ROOT = "mockup/index.html";

# DEBUG SETTINGS
const DEBUG_LEVEL_LOW = "low";
const DEBUG_LEVEL_HIGH = "high";
const DEBUG_LEVEL = DEBUG_LEVEL_HIGH;
const DEBUG_MODE = 1;

# DEBUG QUERY SETTINGS
const DEBUG_QUERY_LEVEL_SELECT = "SELECT";
const DEBUG_QUERY_LEVEL_UPDATE = "UPDATE";
const DEBUG_QUERY_LEVEL_ALL = "ALL";
const DEBUG_QUERY_LEVEL = DEBUG_QUERY_LEVEL_ALL;
const DEBUG_QUERY = 1;


