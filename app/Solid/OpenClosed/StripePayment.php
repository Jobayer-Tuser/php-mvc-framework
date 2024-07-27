<?php

namespace App\Solid\OpenClosed;

class StripePayment implements Payable
{
    public function pay() : string
    {
       return "Stripe payment";
    }
}