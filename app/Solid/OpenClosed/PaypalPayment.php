<?php

namespace App\Solid\OpenClosed;

class PaypalPayment implements Payable
{
    public function pay()
    {
        echo "Paypal payment";
    }
}