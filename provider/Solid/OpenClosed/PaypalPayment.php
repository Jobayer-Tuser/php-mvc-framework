<?php

namespace Provider\Solid\OpenClosed;

class PaypalPayment implements Payable
{
    public function pay()
    {
        echo "Paypal payment";
    }
}