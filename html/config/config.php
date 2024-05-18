<?php

# DATABASE SETTINGS
define("MYSQL_HOST", getenv("MYSQL_HOST"));
define("MYSQL_USER", getenv("MYSQL_USER"));
define("MYSQL_PASSWORD", getenv("MYSQL_PASSWORD"));
define("MYSQL_DATABASE", getenv("MYSQL_DATABASE"));
define("MYSQL_PORT", getenv("MYSQL_LOCAL_PORT"));

# SMTP SETTINGS
define("MAIL_SMTP", getenv("MAIL_SMTP"));
define("MAIL_SMTP_NAME", getenv("MAIL_SMTP_NAME"));
define("MAIL_SMTP_USER", getenv("MAIL_SMTP_USER"));
define("MAIL_SMTP_PASSWORD", getenv("MAIL_SMTP_PASSWORD"));
define("MAIL_SMTP_CRYPTO", getenv("MAIL_SMTP_CRYPTO"));
define("MAIL_SMTP_PORT", getenv("MAIL_SMTP_PORT"));

# SESSION
define("SESSION_TIMEOUT", getenv("SESSION_TIMEOUT")); //in minutes
define("SESSION_SECRET", getenv("SESSION_SECRET"));

# DEFAULT SESSION USER & TOKEN
const USER = "__ApplicationUser";
const TOKEN = "__RequestVerificationToken";

# DEFAULT PAGES
const LOGIN_PAGE = "/login";
const HOME_PAGE = "/home";

# DEFAULT LOCALE
const LOCALE_PT_BR = "pt-BR";
const LOCALE_EN_US = "en-US";
const LOCALE = LOCALE_PT_BR;

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


