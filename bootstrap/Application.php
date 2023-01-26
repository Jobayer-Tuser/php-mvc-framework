<?php

use App\Exceptions\PrettyExceptionHandler;
use App\File\File;
use App\Http\Controllers\Route;
use App\Http\Response;
use App\Sessions\Session;

class Application
{
    public function __construct(){}

    /**
     *
     * @throws ReflectionException
     */
    public static function run(): void
    {
        define('BASE', realpath(dirname(__FILE__,2)));
        define('ROOT', realpath(__DIR__ . "/../"));
        define("VIEWS", ROOT . "/resources/views");
        define("ASSETS", ROOT . "/public/assets/");
        define("CACHE", ROOT . "/storage/cache");

        PrettyExceptionHandler::handle();
        Session::start();
        File::require_directory(path: "routes");
        $data = Route::handleRequest();
        Response::output(data: $data);

    }
}