<?php

namespace App;

use app\classes\route;
use app\classes\request;
use app\classes\session;

defined('ECMS') or die('PROTECTED');


class app
{

    private $test_mod;
    private static $request;
    public static $error = array();

    public static function start()
    {
        self::$request = new Request();
        self::load_routes();
        route::exec(self::$request);
    }

    public static function error($error = 'no text')
    {
        self::$error[] = [
            'date' => date('Y-m-d H:i:s'),
            'date_u' => date('U'),
            'message' => $error,
//            'class' => class::getName(),
        ];
    }

    private static function load_routes()
    {
        foreach (glob(PATH . 'app' . DS . "routes/*.php") as $filename) {
            include $filename;
        }

    }


    public static function is_function_enabled($func)
    {
        $func = strtolower(trim($func));
        if ($func == '')
            return false;
        $disabled = explode(",", @ini_get("disable_functions"));
        if (empty($disabled)) {
            $disabled = array();
        } else {
            $disabled = array_map('trim', array_map('strtolower', $disabled));
        }
        return (function_exists($func) && is_callable($func) &&
            !in_array($func, $disabled)
        );
    }

}

?>