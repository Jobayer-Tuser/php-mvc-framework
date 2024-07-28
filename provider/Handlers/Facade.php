<?php

namespace Provider\Handlers;
#facade is a proxy class
class Facade
{
    public static function __callStatic($method, $arguments)
    {
        (new \App\Http\Controllers\Routes())->$method(...$arguments);
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