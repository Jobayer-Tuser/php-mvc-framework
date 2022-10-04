<?php

namespace App\Controllers;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGateWayService $paymentGateWayService,
        protected EmailService $emailService
    ){

    }

}