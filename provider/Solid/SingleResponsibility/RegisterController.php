<?php

namespace Provider\Solid\SingleResponsibility;

use Provider\Solid\OpenClosed\PaymentService;

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