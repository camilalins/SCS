<?php error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

const MYSQL_HOST = "host.docker.internal";
const MYSQL_USER = "scs";
const MYSQL_PASS = 'Siop@2024';
const MYSQL_DATABASE = "scs";
const MYSQL_PORT = "3336";

const USUARIO = "usuario";
const LOGIN_PAGE = "login/efetuar-login.php";
const MAIN_PAGE = "../views/main.php";
const MAIN_PAGE_TITLE = "SCS";
const MAIN_PAGE_THEME = [
    "PRIMARY" => "teal",
    "PRIMARY-TEXT" => "white",
    "SECONDARY" => "darkcyan",
    "SECONDARY-TEXT" => "black",
    "TEXT" => "black"
];