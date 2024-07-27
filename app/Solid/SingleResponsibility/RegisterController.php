<?php

namespace App\Solid\SingleResponsibility;

use App\Solid\OpenClosed\PaymentService;
use App\Solid\OpenClosed\PaypalPayment;
use App\Solid\OpenClosed\StripePayment;

class RegisterController
{
    public function store(RequestValidation $requestValidation)
    {
        $requestValidation->rules();
    }

    public function makePayment(string $paymentType)
    {
        $gateway = (new PaymentService())->dispatch($paymentType);
        $gateway->pay();
    }
}