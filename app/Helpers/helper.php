<?php

use App\Http\Controllers\View;
use App\Sessions\Cookie;
use App\Sessions\Session;

function view(string $page, array $arguments = []) {
    return View::render($page, $arguments);
}

function asset(array $assets) : void {
    foreach ($assets as $asset){
        echo '<link href="/assets/'.$asset.'"/>';
    }
}

/**
 * @param $path
 * @return void
 */
function redirect($path) : void
{
    header("Location: $path");
    exit();
}

function session($key): ?string
{
    return Session::get($key);
}

function auth($table)
{
    $auth = Session::get($table) ?: Cookie::get($table);
    return \App\Models\Database::table($table)->where("id", "=", $auth)->first();
}