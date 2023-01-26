<?php

use App\Http\Controllers\{Route, ServiceController};

//try {
//    Route::registerRouteFromControllerAttributes([
//        ServiceController::class,
//    ]);
//} catch (ReflectionException $exception) {
//    echo $exception->getMessage();
//}

Route::prefix("admin", function (){
    Route::get("dashboard", [ServiceController::class, "index"]);
});

Route::middleware("Admin", function (){
    Route::get("middleware", [ServiceController::class, "index"]);
});
