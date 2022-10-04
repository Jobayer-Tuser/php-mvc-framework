<?php

use App\Controllers\View;

if(!function_exists("view")){
    function view(string $page, array ...$arguments) {
        $page = str_replace('.', '/', $page);
        return View::page($page, ...$arguments);
    }
}