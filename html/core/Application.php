<?php

namespace core;

require_once "config/const.php";

class Application {

    public static function run(){

        error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

        if (DEBUG_MODE == 1) {
            openlog("localhost", LOG_PID | LOG_PERROR, LOG_LOCAL0);
            syslog(LOG_INFO, $_SERVER["REQUEST_URI"]);
        }

        foreach (glob("controllers/*.php") as $filename) include $filename;
        foreach (glob("controllers/*") as $directory) foreach (glob("$directory/*.php") as $filename) include $filename;

        foreach (glob("controllers/*.php") as $filename) {
            $namespace = "\\controllers\\";
            Application::seekRoutes($namespace, $filename, $routes);
        }

        foreach (glob("controllers/*") as $directory) {
            $namespace = "\\".str_replace("/", "\\", $directory)."\\";
            foreach (glob("$directory/*.php") as $filename)
                Application::seekRoutes($namespace, $filename, $routes);
        }

        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];

        $controller = Application::defineController($uri, $routes);
        $action = strtolower($method); //$action = $path[ACTN] ?: "index";

        if($routes[$controller]) {
            $parthVars = str_replace($routes[$controller], "", $uri);
            $parthVars = str_starts_with($parthVars, "/") ? substr($parthVars, 1, strlen($parthVars)) : $parthVars;
            $GLOBALS["path"] = explode("/", $parthVars);
        }
        //print_r(["ctr" => $controller, "act" => $action, "uri" => $uri, "rou" => $routes]); die();

        if(MOCKUP_MODE == 1) {

            redirect(MOCKUP_ROOT);
            exit();
        }

        try {

            $ctrl = new $controller();
            $ctrl->$action();
        }
        catch (\Error $e) {
            print("Rota não encontrada". (DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH ? ": {$e->getMessage()}. arquivo: <b>{$e->getFile()} {$e->getLine()}</b>" : ""));
        }
        exit();
    }

    private static function seekRoutes($namespace, $filename, &$routes){
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

    private static function seekActions($namespace, $filename, $action, &$actions){
        $controller = $namespace.pathinfo($filename, PATHINFO_FILENAME);
        $methodInfo = new \ReflectionMethod($controller, $action);
        $methodComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $methodInfo->getDocComment() )), function ($part) { return $part != "/"; });

        $methodAction = current(array_filter($methodComments, function ($part) { return strpos(strtoupper($part), "@GET") !== false || strpos(strtoupper($part), "@POST") !== false || strpos(strtoupper($part), "@PUT") !== false || strpos(strtoupper($part), "@DELETE") !== false; }));
        //TODO: CONFIGURAR LEITURA DE REQUEST METHOD POR COMENTARIO
    }

    private static function defineController($uri, $routes){

        foreach ($routes as $key => $value) {

            $path = str_replace("/", "\/", $value);
            if($uri == "/") preg_match("/^$path/", $uri, $matches);
            else preg_match("/^$path$/", $uri, $matches);
            if ($matches) return $key;
        }
    }
}

