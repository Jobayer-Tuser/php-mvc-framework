<?php

use Provider\Handlers\File;
use Provider\Handlers\Response;
use Provider\Handlers\Route;
use Provider\Handlers\Session;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$whoops = (new Run())->pushHandler(new PrettyPageHandler())->register();

define('BASE', realpath(dirname(__FILE__,2)));
define('ROOT', realpath(__DIR__ . "/../"));
const VIEWS = ROOT . "/resources/views/";
const ASSETS = ROOT . "/public/assets/";
const CACHE = ROOT . "/storage/cache/";

Session::start();
File::require_directory(path: "routes");

try {
    $data = Route::handleRequest();
    Response::output(data: $data);
} catch (ReflectionException $e) {

}
