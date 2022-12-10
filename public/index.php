<?php
declare(strict_types=1);
error_reporting(E_ALL); //to show errors
ini_set('display_errors', TRUE); //Sets the value of a configuration option
ini_set('display_startup_errors', TRUE);

define('BASE_PATH', realpath(dirname(__FILE__,2)));
require(BASE_PATH . "/vendor/autoload.php");
const VIEW_PATH = __DIR__ . "/../resources/views";
const BASE_ASSETS_PATH = __DIR__ . "/assets/";

//require (__DIR__ . "/../routes/route.php");
require (__DIR__ . "/../routes/web.php");

//xdebug_info();

//echo BASE_ASSETS_PATH;