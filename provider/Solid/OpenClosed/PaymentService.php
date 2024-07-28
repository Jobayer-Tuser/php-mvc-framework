<?php

namespace Provider\Solid\OpenClosed;

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