<?php

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
    if(MAIN_PAGE && !in_array($path, MAIN_PAGE_EXCLUDES)) {
        $page = $GLOBALS["page"] = "views/$path";
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

function scripts($scripts=null) {
    if($scripts) $GLOBALS["scripts"] = $scripts;
    else foreach ($GLOBALS["scripts"] as $script) if(str_starts_with($script, "<script")) echo $script; else echo "<script src=\"$script\"></script>";
}

function title($name=null){
    if($name) $GLOBALS["title"] = $name;
    else echo $GLOBALS["title"]?:MAIN_PAGE_TITLE;
}

function page(){
    if(!$GLOBALS["page"]) echo "Page not found";
    else return $GLOBALS["page"];
}


