<?php

namespace App\Controllers;

use App\Attributes\{Get,Post};

class ServiceController
{

    #[Get("/hello")]
    public function index()
    {
        return view('service.dashboard');
    }

    #[Post("/store")]
    public function store() : void
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}