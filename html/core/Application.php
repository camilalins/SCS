<?php

namespace core;

use core\exceptions\RouteException;

class Application {

    public static function run(): void{

        try {

            # BASIC PARAMS
            $uri = $_SERVER["REQUEST_URI"];
            $rawuri = str_contains($uri, "?") ? substr($uri, 0, strpos($uri, "?")) : $uri;
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
            foreach (glob("core/exceptions/*.php") as $filename) include_once $filename;
            foreach (glob("core/exceptions/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;
            foreach (glob("core/controllers/*.php") as $filename) include_once $filename;
            foreach (glob("core/controllers/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE MODELS
            foreach (glob("models/*.php") as $filename) include_once $filename;
            foreach (glob("models/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;
            foreach (glob("models/enums/*.php") as $filename) include_once $filename;
            foreach (glob("models/enums/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

            #INCLUDE SERVICES
            foreach (glob("services/*.php") as $filename) include_once $filename;
            foreach (glob("services/*") as $directory) foreach (glob("$directory/*.php") as $filename) include_once $filename;

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

            $controller = Application::defineController($rawuri, $routes); //print_r([$controller, $routes[$controller]]); die();
            if (!$controller) Application::isRequestJson() ? response(NOT_FOUND_404) : responseText(NOT_FOUND_404);

            $actionInfo = Application::defineAction($rawuri, $routes[$controller], $controller, $method); //print_r([$uri, $actionInfo]); die();
            if (!$actionInfo) Application::isRequestJson() ? response(NOT_FOUND_404) : responseText(NOT_FOUND_404);
            else if (!$actionInfo->path) Application::isRequestJson() ? response(METHOD_NOT_ALLOWED_405) : responseText(METHOD_NOT_ALLOWED_405);

            Application::definePathVariables($rawuri, $routes[$controller], $actionInfo->path);
            #./SEEKING ROUTES

            # MOCKUP OPTION
            if(MOCKUP_MODE == 1) redirect(MOCKUP_ROOT);

            #ROUTE CALL
            self::routeCall($controller, $actionInfo->name);

        }
        catch (RouteException $e) {
            $errorMessage = "{$e->getMessage()}\nArquivo: {$e->getFile()} {$e->getLine()}";
            Application::isRequestJson()
                ? response($errorMessage, 400)
                : responseText($errorMessage, 400);
        }
        catch (\Exception $e) {
            response(sys_messages(MSG_GERAL_ERR_A001, "{$e->getMessage()}\nArquivo: {$e->getFile()} {$e->getLine()}"), 400);
        }

        exit();
    }

    /**
     * @throws \ReflectionException
     * @throws RouteException
     */
    private static function seekRoutes($namespace, $filename, &$routes): void
    {
        $controller = $namespace.pathinfo($filename, PATHINFO_FILENAME);
        $classInfo = new \ReflectionClass($controller);
        $classComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $classInfo->getDocComment())), function ($part) { return $part != "/"; });
        $classRoute = current(array_filter($classComments, function ($part) { return str_contains(strtoupper($part), "@ROUTE"); }));
        preg_match_all('/\(([^\)]*)\)/', $classRoute, $classRouteMatches);
        $classRouteParams = array_map('trim', explode(',', str_replace("\"", "", current($classRouteMatches[1]))));
        $classRouteParamPath = current($classRouteParams);
        if ($classRouteParamPath)
            $routes[ $controller ] = str_starts_with($classRouteParamPath, "/") ? $classRouteParamPath : "/". $classRouteParamPath;
        else if ($classRoute)
            $routes[ $controller ] = "/";

        if(count($routes) !== count(array_unique($routes))) throw new RouteException("Rota duplicada");
    }

    /**
     * @throws \ReflectionException
     * @throws RouteException
     */
    private static function seekActions($controller): array
    {
        $classInfo = new \ReflectionClass($controller);
        $classMethods = $classInfo->getMethods(\ReflectionMethod::IS_PUBLIC);
        $classActions = array_filter(array_map(function ($methodInfo) {
            $methodComments = array_filter(array_map(function ($part) { return trim($part," *"); }, explode("\n", $methodInfo->getDocComment() )), function ($part) { return $part != "/"; });
            $methodRequestParam = current(array_filter($methodComments, function ($part) { return str_contains(strtoupper($part), "@GET") || str_contains(strtoupper($part), "@POST") || str_contains(strtoupper($part), "@PUT") || str_contains(strtoupper($part), "@DELETE"); }));
            preg_match_all('/\(([^\)]*)\)/', $methodRequestParam, $methodRequestParamMatches);
            $methodRequestParamParams = array_map('trim', explode(',', str_replace("\"", "", current($methodRequestParamMatches[1]))));
            $methodRequestParamPath = current($methodRequestParamParams);
            $methodRequestParamOnly = current(explode("(", $methodRequestParam));
            $methodRequestParamAsMethod = strtoupper(substr($methodRequestParamOnly, 1));

            return $methodRequestParam ? (object)[ "name" => $methodInfo->getName(), "param" => $methodRequestParamOnly, "method" => $methodRequestParamAsMethod, "path" => str_starts_with($methodRequestParamPath, "/") ? $methodRequestParamPath : "/".$methodRequestParamPath ] : null;
        }, $classMethods), function ($part){ return $part != null; });

        $classActionsPaths = array_map(function ($action) { return "$action->method $action->path"; }, $classActions);
        if(count($classActionsPaths) !== count(array_unique($classActionsPaths))) throw new RouteException("Rota de ação duplicada");

        return $classActions;
    }

    private static function defineController($uri, $routes=[], $root=false){

       foreach ($routes as $key => $value) {

            $path = str_replace("/", "\/", $value);
            preg_match("/^$path/", $uri, $matches);
            if($root && $matches) return $key;
            else if ($matches && $value != "/") return $key;
        }
        return Application::defineController("/", $routes, true);
    }

    private static function defineAction($uri, $route, $controller, $method){

        $hasAction = false;
        $routeRegex = str_replace("/", "\/", $route);
        $actionUri = preg_replace("/^$routeRegex/", "", $uri);

        //$actionUri = $actionUri ?: "/".$actionUri;
        $actionUri = !str_starts_with($actionUri, "/") ? "/".$actionUri : $actionUri;

        $actions = Application::seekActions($controller);
        foreach ($actions as $action) {

            $pathRegex = str_replace("/", "\/", $action->path);
            $pathRegex = preg_replace("/{\\w+}/", "\\w+", $pathRegex); //print_r([$action->path, $actionUri, $pathRegex]);

            preg_match("/^$pathRegex$/", $actionUri, $matches);
            if ($matches) {
                $hasAction = true;
                if($method == $action->method) return $action;
            }
        }
        return $hasAction ? (object)["name" => "", "path" => ""] : null;
    }

    private static function definePathVariables($uri, $controllerRoute, $actionPath){

        #SEEKING ROUTES - DEFINE PATH VARIABELS
        if($controllerRoute && $actionPath) {

            $pathVars = array_filter(array_map(function ($key, $value) { return preg_match("/{(.*?)}/", $key, $matches) ? [$matches[1] => $value] : null;  }, explode("/", $controllerRoute . $actionPath), explode("/", $uri)), function ($part) { return $part != null; });
            $vars = [];
            array_walk($pathVars, function ($e) use(&$vars) { $key = array_key_first($e); $vars[$key] = $e[$key]; });

            $GLOBALS["path"] = $vars;
        }
    }

    private static function isRequestJson(): bool
    {
        $accept = getallheaders()["Accept"] ?: "";
        $contentType = getallheaders()["Content-Type"] ?: "";
        return str_contains($accept, "application/json") || str_contains($contentType, "application/json");
    }
    /**
     * @deprecated
     */
    private static function defineActionOri($uri, $method, $controller, $route){

        $actionUri = preg_replace("/^\\$route/", "", $uri);
        $actionUri = $actionUri ? (str_starts_with($actionUri, "/") ? substr($actionUri, 1) : $actionUri) : "";
        $actionUri = "/".current(explode("/", $actionUri));

        $actions = Application::seekActions($controller); //print_r([$actionUri, $actions]); die();
        foreach ($actions as $action) {

            $path = preg_replace('/(\/?{\\w+})+/', "", $action->path);
            $path = $path?:"/";
            $path = str_replace("/", "\/", $path);
            preg_match("/^$path/", $actionUri, $matches);
            if ($matches && $method == $action->method && current($matches) != "/") return $action;
        }
        return Application::defineRootPathAction($method, $controller, $route);
    }
    /**
     * @deprecated
     */
    private static function defineRootPathAction($method, $controller, $route){

        $actions = Application::seekActions($controller);
        foreach ($actions as $action) {

            $path = preg_replace('/(\/?{\\w+})+/', "", $action->path);
            $path = $path?:"/";
            $path = str_replace("/", "\/", $path);
            preg_match("/^$path/", "/", $matches);
            if ($matches && $method == $action->method) return $action;
        }
        return null;
    }


    private static function routeCall($controller, $action): void{

        try {

            $ctrl = new $controller();
            $ctrl->$action();
        }
        catch (\Error $e) {
            $errorMessage = sys_messages(MSG_GERAL_ERR_A002, "{$e->getMessage()}\nArquivo: <b>{$e->getFile()} {$e->getLine()}");
            if(DEBUG_MODE == 1 && DEBUG_LEVEL == DEBUG_LEVEL_HIGH)
                print_r($errorMessage);
            else
            Application::isRequestJson()
                ? response($errorMessage, 400)
                : responseText($errorMessage, 400);
        }
    }

}

