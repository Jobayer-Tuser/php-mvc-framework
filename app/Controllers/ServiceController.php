<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;

class ServiceController
{

    #[Get("/hello")]
    public function index()
    {
        return view('service.index', ["fo" => "bar"]);
    }

    #[Post("/store")]
    public function store() : void
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}