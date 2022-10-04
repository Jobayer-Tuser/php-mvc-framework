<?php

use App\Controllers\{Route, ServiceController, TransactionController};

//$amount = (new TransactionController(20.0, "Description of amount"))
//    ->addTax(20)
//    ->applyDiscount(5)
//    ->getAmount();
//
//var_dump($amount);

Route::post("/service/store", [ServiceController::class, "store"]);
Route::post("/service", "ServiceController@index");

Route::get("/hello", function (){
    echo "Hello";
});

Route::get("/greet/(\w+)", function ($name){
    echo "Hello{$name}";
});

Route::post("/hello", function (){
    echo $_SERVER["REQUEST_METHOD"];
});

Route::get("/service", [ServiceController::class, "index"]);