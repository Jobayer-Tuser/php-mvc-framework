<?php

declare(strict_types=1);

namespace App\Controllers;

class TransactionController
{
    private ?float $amount;
    private string $description;

    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function addTax(float $rate): TransactionController
    {
        $this->amount += $this->amount * $rate / 100;
        return $this; // method chaining1
    }

    public function applyDiscount(float $rate): TransactionController
    {
        $this->amount += $this->amount * $rate / 100;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

}