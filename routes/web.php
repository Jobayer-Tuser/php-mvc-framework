<?php

use App\Http\Controllers\{CodeCompilerController, FaceDetectController, HomepageController};
use App\Http\Controllers\ServiceController;
use Provider\Handlers\Route;


Route::get("/", [HomepageController::class, "index"]);
Route::get("/dashboard", [HomepageController::class, "dashboard"]);

Route::get('compiler', [CodeCompilerController::class, 'index']);
Route::get('face-detect', [FaceDetectController::class, 'index']);