<?php

use Provider\Handlers\DotEnv;
use Provider\Handlers\File;
use Provider\Handlers\Response;
use Provider\Handlers\Route;
use Provider\Handlers\Session;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

define('BASE', realpath(dirname(__FILE__,2)));
define('ROOT', realpath(__DIR__ . "/../"));
const VIEWS = ROOT . "/resources/views/";
const CACHE = ROOT . "/storage/cache/";
const CONFIG = ROOT . "/config/";
const ASSETS = ROOT . "/public/assets/";

(new DotEnv(ROOT . "/.env"))->load();

(new Run())->pushHandler(new PrettyPageHandler())->register();

Session::start();

File::requireDirectory(path: "routes");

try {
    $data = Route::handleRequest();
    Response::output(data: $data);
} catch (ReflectionException $e) {

}
