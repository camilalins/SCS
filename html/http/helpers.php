<?php

session_start();

function session($name, $value=null){
    if($value) $_SESSION[$name] = $value;
    else return $_SESSION[$name];
}

function redirect($url) {
    header("Location: /$url");
    exit();
}

function view($path, $data=null){
    extract($data ?: []);
    include "../views/$path";
}

function body($name=null){
    return $name ? $_POST[$name] : (object)$_POST;
}

function query($name=null){
    return $name ? $_GET[$name] : (object)$_GET;
}



