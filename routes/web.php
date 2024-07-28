<?php

use App\Http\Controllers\{HomepageController};
use App\Http\Controllers\ServiceController;
use Provider\Handlers\Route;


Route::get("/", [HomepageController::class, "index"]);