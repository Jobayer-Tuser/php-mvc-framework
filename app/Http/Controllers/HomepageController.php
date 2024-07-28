<?php

namespace App\Http\Controllers;

class HomepageController
{
    public function index()
    {
        return view('layouts.app');
    }
}