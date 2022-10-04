<?php

namespace Route\Path;

use App\Libraries\Route;
use App\Http\controller\Controller;
use App\Http\controller\TestController;


Route::get('/', function(){
    include __DIR__ . '/../public/index.php';
});
Route::get('/home', [Controller::class, 'index']);
Route::get('/test/index', [TestController::class, 'index']);
Route::get('/test/update', [TestController::class, 'update']);

//make some changes in here


// Route::get('/home', 'Controller@index');
Route::cleanUrl();