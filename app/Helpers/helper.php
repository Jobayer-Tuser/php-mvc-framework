<?php

use App\Controllers\View;

if(!function_exists("view")){
    function view(string $page, array ...$arguments) {
        $page = str_replace('.', '/', $page);
        return View::page($page, ...$arguments);
    }
}

if(!function_exists("loadCss")){
    function loadCss(array $assets) : void {
        foreach ($assets as $asset){
            echo '<link href="/assets/'.$asset.'"/>';
        }
    }
}

if(!function_exists("loadJs")){
    function loadJs(array $assets) : void {
        foreach ($assets as $asset){
            echo '<script src="/assets/'.$asset.'" ></script>';
        }
    }
}