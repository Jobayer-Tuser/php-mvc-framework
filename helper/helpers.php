<?php

use JetBrains\PhpStorm\NoReturn;
use Provider\Handlers\Cookie;
use Provider\Handlers\Database;
use Provider\Handlers\Session;
use Provider\Handlers\View;

function view(string $page, array $arguments = []): string
{
    return View::render($page, $arguments);
}

function tempDir(): string
{
    return __DIR__ . '/../temp/';
}

#[NoReturn] function redirect($path) : void
{
    header("Location: $path");
    exit();
}

function session($key): ?string
{
    return Session::get($key);
}

function auth($table): false|array
{
    $auth = Session::get($table) ?: Cookie::get($table);
    return Database::table($table)->where("id", "=", $auth)->first();
}