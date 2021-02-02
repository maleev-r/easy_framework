<?php

namespace App;
define('ECMS', 1);
define('DS', DIRECTORY_SEPARATOR);
define('PATH', dirname(__FILE__) . DS);
date_default_timezone_set('Europe/Minsk');

ini_set("display_errors", 1);
include PATH . DS . 'app' . DS . 'autoload.php';
include PATH . DS . 'app' . DS . 'app.php';
app::start();