<?php
$autoload_dir = array(
//    PATH . 'app' . DS . 'classes',
//    PATH . 'app' . DS . 'core',
    PATH . 'app' . DS . 'functions',
//    PATH . 'app' . DS . 'controllers',
//    PATH . 'app' . DS . 'models',
//    PATH . 'app' . DS . 'views',
);
foreach ($autoload_dir as $directory) {
    foreach (glob($directory . "/*.php") as $filename) {
//        echo $filename;
        require_once $filename;
    }
}

spl_autoload_register(function ($class) {
    $require_path = strtolower(str_replace('\\', DS, $class) . '.php');
//    echo $require_path."<br>";
    require_once $require_path;
});

