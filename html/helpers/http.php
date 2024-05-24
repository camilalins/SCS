<?php

function session($name, $value=null){
    if($value) $_SESSION[$name] = $value;
    else return $_SESSION[$name];
}

function cookie($name, $value=null){

    if($value) {

        $cookie = session_get_cookie_params();
        setcookie(
            $name, //name
            $value, //value
            [
                "expires" => time() + (SESSION_TIMEOUT?:60*30), // lifetime
                "path" => $cookie["path"],//path
                "domain" => DOMAIN,//domain
                "secure" => true, //secure
                "httponly" => true,  //httpOnly
                "samesite" => "lax"
            ]
        );

    } else return $_COOKIE[$name];
}

function redirect($url): void
{
    if($url == "/") $url = "";
    if(str_starts_with($url, "/")) $url = substr($url, 1, strlen($url));
    header("Location: /$url");
    exit();
}

function response(mixed $json, int $statusCode=200): void {

    switch ($json) {

        case BAD_REQUEST_400:
            $statusCode = 400;
            $responseText = status($json);  break;

        case UNAUTHORIZED_401:
            $statusCode = 401;
            $responseText = status($json);  break;

        case NOT_FOUND_404:
            $statusCode = 404;
            $responseText = status($json);  break;

        case METHOD_NOT_ALLOWED_405:
            $statusCode = 405;
            $responseText = status($json);  break;

        default:
            $responseText = gettype($json) == "string" ? json_encode([ "message" => $json ]) : json_encode($json);
            break;
    }
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');

    echo $responseText;
    exit();
}

function responseText(mixed $text, int $statusCode=200): void {

    switch ($text) {
        case BAD_REQUEST_400:
            $statusCode = 400;
            $responseText = status($text);  break;

        case UNAUTHORIZED_401:
            $statusCode = 401;
            $responseText = status($text);  break;

        case NOT_FOUND_404:
            $statusCode = 404;
            $responseText = status($text);  break;

        case METHOD_NOT_ALLOWED_405:
            $statusCode = 405;
            $responseText = status($text);  break;

        default:
            if (gettype($text) == "string") $responseText = nl2br($text);
            else $responseText = $statusCode < 400 ? "OK" : "Undefined";
            break;
    }
    http_response_code($statusCode);
    header('Content-Type: text/html; charset=utf-8');

    if(gettype($text) == "string")
        view($statusCode < 400 ? "general.php" : "error.php", [ "statusCode" => $statusCode, "responseText" => $responseText ]);
    else
        view($statusCode < 400 ? "general.php" : "error.php", [ "statusCode" => $statusCode, "responseText" => $responseText ]+(array)$text);
    exit();
}

function view($path, $data=null): void {

    extract($data ?: []);

    if(MAIN_PAGE && !in_array($path, MAIN_PAGE_EXCLUDES)) {
        $page = $GLOBALS["page"] = "views/$path";
        include "views/".MAIN_PAGE.".php";
    }
    else include "views/$path";
}

function body($name=null){

    //TODO: SANITIZAR ENTRADAS
    $post = !empty($_POST)?(object)$_POST:json_decode(file_get_contents('php://input'), false);
    return $name ? $post->$name : $post;
}

function post($name=null){
    return $name ? $_POST[$name] : $_POST;
}

function query($name=null){
    return $name ? $_GET[$name] : (object)$_GET;
}

function get($name=null){
    return $name ? $_GET[$name] : $_GET;
}

function path($id=null){
    return $id && $GLOBALS["path"] ? $GLOBALS["path"][$id] : $GLOBALS["path"][0];
}

function scripts($scripts=null) {

    $loadScripts = function(){

        echo "<script src=\"/public/js/helper-functions.js\"></script>";

        foreach ($GLOBALS["scripts"] as $script)
            if (gettype($script) == "string") {
                if (str_starts_with($script, "<script"))
                    echo $script;
                else
                    echo "<script src=\"$script\"></script>";
            }
            else if(gettype($script) == "array") {
                $props = implode(" ", array_map(function ($k, $v) { return "$k=\"$v\""; }, array_keys($script), array_values($script)));
                echo "<script $props></script>";
            }
    };

    if($scripts) {
        $GLOBALS["scripts"] = $scripts;
        return $loadScripts;
    }
    else $loadScripts();
}

function title($name=null){
    if($name) $GLOBALS["title"] = $name;
    else echo $GLOBALS["title"]?:MAIN_PAGE_TITLE;
}

function page(){
    if(!$GLOBALS["page"]) echo "Page not found";
    else return $GLOBALS["page"];
}

function csrf(): void {
    $name = TOKEN;
    $value = password_hash(SESSION_SECRET, PASSWORD_BCRYPT);
    echo "<input type=\"hidden\" name=\"$name\" value=\"$value\">";
}
