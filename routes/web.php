<?php

use App\Controllers\{Route, ServiceController, TransactionController, SendEmail};

try {
    Route::registerRouteFromControllerAttributes([
        ServiceController::class,
    ]);
} catch (ReflectionException $exception) {
    echo $exception->getMessage();
}