<?php


namespace App\Classes;
use App\Classes\Request;



class route
{
    private static $routes = array();

    private function __construct()
    {

    }

    public static function get($pattern, $action_class, $action_method = 'index', $params = null)
    {
        $route['method'] = 'get';
        $route['pattern'] = $pattern;
        $route['action'] = $action_class;
        $route['action_method'] = $action_method;
        $route['params'] = $params;
        self::$routes[] = $route;
    }

    public static function post($pattern, $action_class, $action_method = 'index', $params = null)
    {
        $route['method'] = 'post';
        $route['pattern'] = $pattern;
        $route['action'] = $action_class;
        $route['action_method'] = $action_method;
        $route['params'] = $params;
        self::$routes[] = $route;
    }

    public static function exec(Request $request)
    {
        $reqUrl = strtolower($_SERVER['REQUEST_URI']);
        $reqUrl = rtrim($reqUrl, '/');
        $reqMet = strtolower($_SERVER['REQUEST_METHOD']);
        foreach (self::$routes as $route) {
            $route_pattern = rtrim($route['pattern'], '/');
            // convert urls like '/users/:uid/posts/:pid' to regular expression
            $pattern = '{' . preg_replace('/\{[a-z0-9]+\}/', "([a-z0-9]+)", $route_pattern) . '}';
            $matches = array();

            if ($reqMet == $route['method'] && preg_match($pattern, $reqUrl, $matches)) {

                // remove the first match
                array_shift($matches);
                // call the callback with the matched positions as params

                $controller_class = PATH . 'app' . DS . 'controllers' . DS . $route['action'] . '.php';
                if (file_exists($controller_class)) {
                    require_once $controller_class;
                    $action = '\App\Controllers\\'.$route['action'];
                    $controller = new $action;
                    return call_user_func_array(array($controller, $route['action_method']), $matches);
                }
//                $action_class = new $route['action'];
//                return call_user_func_array(array($controller, $route['action_method']), $matches);
            }
        }
    }
}