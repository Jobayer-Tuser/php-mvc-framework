<?php

namespace App\Http\Controllers;

use App\Models\Database;
use App\Attributes\{Get, Post};


class ServiceController
{

    #[Get("/hello")]
    public function index()
    {
//        dd($_SERVER);

        Database::getInstance();
        $data = ['name' => "Jobayer"];
        return view("service.dashboard", $data);
    }

    #[Post("/store")]
    public function store() : void
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}