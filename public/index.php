<?php
declare(strict_types=1);

error_reporting(E_ALL); //to show errors
ini_set('display_errors', "1"); //Sets the value of a configuration option
ini_set('display_startup_errors', "1");

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require(__DIR__ . "/../vendor/autoload.php");

/*
|--------------------------------------------------------------------------
| Bootstrap the application
|--------------------------------------------------------------------------
*/
require(__DIR__ . "/../bootstrap/app.php");