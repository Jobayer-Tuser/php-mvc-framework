<?php

namespace App\Http\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = "404 page not found";

    public function __construct(){}
}