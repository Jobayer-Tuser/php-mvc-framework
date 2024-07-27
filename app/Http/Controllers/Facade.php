<?php

namespace App\Http\Controllers;
#facade is a proxy class
class Facade
{
    public static function __callStatic($method, $arguments)
    {
        (new Routes())->$method(...$arguments);
    }
}

class Routes
{
    public function get($url, $callback)
    {
        echo "get method";
    }
}


Facade::get("url", "callback");