<?php

namespace App\Controllers;

use App\Attributes\Get;

class ServiceController
{

    #[Get("/hello")]
    public function index()
    {
        return view('service.index', ["fo" => "bar"]);
    }

    public function store() : void
    {

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}