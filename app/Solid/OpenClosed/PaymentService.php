<?php

namespace App\Solid\OpenClosed;

class PaymentService
{
    public function dispatch(string $paymentType) : Payable
    {
        return match ($paymentType){
            'stripe' => new PaypalPayment(),
            'paypal' => new StripePayment(),
        };
    }
}