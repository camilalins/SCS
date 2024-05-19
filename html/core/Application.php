<?php

namespace core;

class Application {

    public static function run(): void{

        try {

            # BASIC PARAMS
            $uri = $_SERVER["REQUEST_URI"];
            $method = $_SERVER["REQUEST_METHOD"];
            $status = http_response_code();

            #INCLUDE CONFIG
            foreach (glob("config/*.php") as $filename) include_once $filename;
            foreach (glob("config/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE HELPERS
            foreach (glob("helpers/*.php") as $filename) include_once $filename;
            foreach (glob("helpers/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE CORE
            foreach (glob("core/*.php") as $filename) include_once $filename;
            foreach (glob("core/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;
            foreach (glob("core/controllers/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE MODELS
            foreach (glob("models/*.php") as $filename) include_once $filename;
            foreach (glob("models/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE REPO
            foreach (glob("repo/*.php") as $filename) include_once $filename;
            foreach (glob("repo/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE CONTROLLERS
            foreach (glob("controllers/*.php") as $filename) include_once $filename;
            foreach (glob("controllers/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;
            foreach (glob("controllers/api/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #SESSION
            session_start([ 'cookie_lifetime' => time() + (SESSION_TIMEOUT?:60*30), 'cookie_secure' => true, 'cookie_httponly' => true ]);

            $cookie = session_get_cookie_params();
            $sessid = session_id();
            setcookie(
                'PHPSESSID', //name
                $sessid, //value
                [
                    "expires" => time() + (SESSION_TIMEOUT?:60*30), // lifetime
                    "path" => $cookie["path"],//path
                    "domain" => DOMAIN,//domain
                    "secure" => true, //secure
                    "httponly" => true,  //httpOnly
                    "samesite" => "lax"
                ]
            );

            #WARNING LEVEL
            error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

            #DEBUG LOG
            if (DEBUG_MODE == 1) {
                openlog(getHostByName(getHostName()), LOG_PID | LOG_PERROR, LOG_LOCAL0);
                syslog(LOG_INFO, now(LOCALE, "d/M/Y:H:i:s")."+0000 \"$method $uri\" $status");
            }

            #SEEKING ROUTES
            $routes = [];
            foreach (glob("controllers/*.php") as $filename) {
                $namespace = "\\controllers\\";
                Application::seekRoutes($namespace, $filename, $routes);
            }
            foreach (glob("controllers/*") as $directory) {
                $namespace = "\\".str_replace("/", "\\", $directory)."\\";
                foreach (glob("$directory/*.php") as $filename)
                    Application::seekRoutes($namespace, $filename, $routes);
            }
            foreach (glob("controllers/api/*") as $directory) {
                $namespace = "\\".str_replace("/", "\\", $directory)."\\";
                foreach (glob("$directory/*.php") as $filename)
                    Application::seekRoutes($namespace, $filename, $routes);
            }

            #SEEKING ROUTES - DEFINE CONTROLLER & ACTION

            $controller = Application::defineController($uri, $routes);
            $action = strtolower($method);

            #SEEKING ROUTES - DEFINE PATH VARIBELS
            if($routes[$controller]) {
                $parthVars = str_replace($routes[$controller], "", $uri);
                $parthVars = str_starts_with($parthVars, "/") ? substr($parthVars, 1, strlen($parthVars)) : $parthVars;
                $GLOBALS["path"] = explode("/", $parthVars);
            }

            #./SEEKING ROUTES

            # MOCKUP OPTION
            if(MOCKUP_MODE == 1) redirect(MOCKUP_ROOT);

            #ROUTE CALL
            self::routeCall($controller, $action);

        }
        catch (\Exception $e) {
            print("Falha na aplicação: ". (DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": {$e->getMessage()}. arquivo: <b>{$e->getFile()} {$e->getLine()}</b>" : ""));
        }

        exit();
    }

    private static function seekRoutes($namespace, $filename, &$routes): void
    {
        $controller = $namespace.pathinfo($filename, PATHINFO_FILENAME);
        $classInfo = new \ReflectionClass($controller);
        $classComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $classInfo->getDocComment())), function ($part) { return $part != "/"; });
        $classRoute = current(array_filter($classComments, function ($part) { return strpos(strtoupper($part), "@ROUTE") !== false; }));
        preg_match_all('/\(([^\)]*)\)/', $classRoute, $classRouteMatches);
        $classRouteParams = array_map('trim', explode(',', str_replace("\"", "", current($classRouteMatches[1]))));
        $classRouteParamPath = current($classRouteParams);
        if ($classRouteParamPath)
            $routes[ $controller ] = str_starts_with($classRouteParamPath, "/") ? $classRouteParamPath : "/". $classRouteParamPath;
        else if ($classRoute)
            $routes[ $controller ] = "/";

    }

    private static function seekActions($namespace, $filename, $action, &$actions): void
    {
        $controller = $namespace.pathinfo($filename, PATHINFO_FILENAME);
        $methodInfo = new \ReflectionMethod($controller, $action);
        $methodComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $methodInfo->getDocComment() )), function ($part) { return $part != "/"; });

        $methodAction = current(array_filter($methodComments, function ($part) { return strpos(strtoupper($part), "@GET") !== false || strpos(strtoupper($part), "@POST") !== false || strpos(strtoupper($part), "@PUT") !== false || strpos(strtoupper($part), "@DELETE") !== false; }));
        //TODO: CONFIGURAR LEITURA DE REQUEST METHOD POR COMENTARIO
    }

    private static function defineController($uri, $routes=[]){

        foreach ($routes as $key => $value) {

            $path = str_replace("/", "\/", $value);
            if($uri == "/") preg_match("/^$path/", $uri, $matches);
            else preg_match("/^$path$/", $uri, $matches);
            if ($matches) return $key;
        }
    }

    private static function routeCall($controller, $action): void{

        try {

            $ctrl = new $controller();
            $ctrl->$action();
        }
        catch (\Error $e) {
            http_response_code(400);
            echo sys_messages(MSG_GERAL_ERR_A001, $e->getMessage(). ". arquivo: <b>{$e->getFile()} {$e->getLine()}</b>");
            die();
        }
    }

}

