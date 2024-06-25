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

    $status = status($json);
    if(!$status) {

        $status = gettype($json) == "string"
            ? [ "statusCode" => $statusCode, "responseText" => json_encode([ "message" => $json ]) ]
            : [ "statusCode" => $statusCode, "responseText" => json_encode($json) ];
    }

    http_response_code($status["statusCode"]);
    header('Content-Type: application/json; charset=utf-8');

    echo $status["responseText"];
    exit();
}

function responseText(mixed $text, int $statusCode=200): void {

    $status = status($text);
    if(!$status) {

        $status = gettype($text) == "string"
            ? [ "statusCode" => $statusCode, "responseText" => nl2br($text) ]
            : [ "statusCode" => $statusCode, "responseText" => ((array)$text)["message"] ] + (array)$text;
    }

    http_response_code($status["statusCode"]);
    header('Content-Type: text/html; charset=utf-8');

    view("error.php", $status);
    exit();
}

function view($path, $data=null): void {

    extract($data ?: []);
    $views = "views";
    $mainPageFolderExcludes = array_filter(array_map(function ($e) use($views) {
        if(!str_contains($e, "*")) return null;
        $excludes = [];
        foreach (glob("$views/$e") as $filename) $excludes[] = $filename;
            foreach (glob("$views/$e") as $directory) foreach (glob("$directory/*.php") as $filename) $excludes[] = $filename;
        return $excludes?:null;
    }, MAIN_PAGE_EXCLUDES), function ($e) { return isset($e); });
    $mainPageFilesExcludes = array_filter(array_map(function ($e) use($views) {
        if(str_contains($e, "*")) return null;
        return "$views/$e";
    }, MAIN_PAGE_EXCLUDES), function ($e) { return isset($e); });
    $mainPageExcludes = array_merge($mainPageFilesExcludes, ...$mainPageFolderExcludes);

    if(MAIN_PAGE && !in_array("$views/$path", $mainPageExcludes)) {
        $page = $GLOBALS["page"] = "$views/$path";
        include "$views/".MAIN_PAGE.".php";
    }
    else include "$views/$path";
}

function viewError($text=BAD_REQUEST_400, $statusCode=400): void {

    viewCustom("error.php", $text, $statusCode);
}

function viewGeneral($text=BAD_REQUEST_400, $statusCode=400): void {

    viewCustom("general.php", $text, $statusCode);
}

function viewCustom($page, $text=BAD_REQUEST_400, $statusCode=400): void {

    $status = status($text);
    if(!$status) {

        $status = gettype($text) == "string"
            ? [ "statusCode" => $statusCode, "responseText" => nl2br($text) ]
            : [ "statusCode" => $statusCode, "responseText" => ((array)$text)["message"] ] + (array)$text;
    }

    http_response_code($status["statusCode"]);
    header('Content-Type: text/html; charset=utf-8');

    view($page, $status);
    exit();
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
    return $name ? ( $_GET[$name] ?: isset($_GET[$name]) ) : (object)$_GET;
}

function get($name=null){
    return $name ? $_GET[$name] : $_GET;
}

function path($id=null){
    return $id && $GLOBALS["path"] ? $GLOBALS["path"][$id] : $GLOBALS["path"][0];
}

function scripts($scripts=null) {

    $loadScripts = function(){

        echo "<script id=\"script-helper-functions\" src=\"/public/js/helper-functions.js\" encdata=\"".b64JsonEncode([ "locale" => LOCALE, "tz" => TZ ])."\"></script>\n\t";

        foreach ($GLOBALS["scripts"] as $script)
            if (gettype($script) == "string") {
                if (str_starts_with($script, "<script"))
                    echo "$script\n\t";
                else
                    echo "<script src=\"$script\"></script>\n\t";
            }
            else if(gettype($script) == "array") {
                $props = implode(" ", array_map(function ($k, $v) { return "$k=\"$v\""; }, array_keys($script), array_values($script)));
                echo "<script $props></script>\n\t";
            }
        echo "\r\n";
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
