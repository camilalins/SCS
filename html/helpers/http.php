<?php

require_once "config/const.php";

session_start();

function session($name, $value=null){
    if($value) $_SESSION[$name] = $value;
    else return $_SESSION[$name];
}

function redirect($url) {
    if($url == "/") $url = "";
    if(str_starts_with($url, "/")) $url = substr($url, 1, strlen($url));
    header("Location: /$url");
    exit();
}

function view($path, $data=null){
    extract($data ?: []);
    if(MAIN_PAGE && !in_array($path, MAIN_PAGE_EXCLUDE)) {
        $page = "views/$path";
        include "views/".MAIN_PAGE.".php";
    }
    else include "views/$path";
}

function body($name=null){
    return $name ? $_POST[$name] : (object)$_POST;
}

function query($name=null){
    return $name ? $_GET[$name] : (object)$_GET;
}

function path($id=null){
    return $id && $GLOBALS["path"] ? $GLOBALS["path"][$id] : $GLOBALS["path"][0];
}


