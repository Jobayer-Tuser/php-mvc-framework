<?php
declare(strict_types=1);

require (__DIR__ .'/../vendor/autoload.php');
define("VIEW_PATH", __DIR__ . "/../resources");
define("CACHE_PATH", __DIR__ . "/../cache");

//require (__DIR__ . "/../routes/route.php");
require (__DIR__ . "/../routes/web.php");

//xdebug_info();