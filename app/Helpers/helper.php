<?php

use App\Http\Controllers\View;

    function view(string $page, array ...$arguments) {
        return View::render($page, ...$arguments);
    }

    function loadCss(array $assets) : void {
        foreach ($assets as $asset){
            echo '<link href="/assets/'.$asset.'"/>';
        }
    }

    function loadJs(array $assets) : void {
        foreach ($assets as $asset){
            echo '<script src="/assets/'.$asset.'" ></script>';
        }
    }

/**
 * @param $path
 * @return void
 */
function redirect($path) : void {
    header("Location: $path");
    exit();
}