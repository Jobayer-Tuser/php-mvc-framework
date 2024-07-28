<?php

use Provider\Handlers\Cookie;
use Provider\Handlers\Session;
use Provider\Handlers\View;

function view(string $page, array $arguments = []): string
{
    return View::render($page, $arguments);
}

function asset(array $assets) : void
{
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
    return \Provider\Handlers\Database::table($table)->where("id", "=", $auth)->first();
}