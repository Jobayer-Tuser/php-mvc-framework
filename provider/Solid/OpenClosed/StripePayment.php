<?php

namespace Provider\Solid\OpenClosed;

class StripePayment implements Payable
{
    public function pay() : string
    {
       return "Stripe payment";
    }
}