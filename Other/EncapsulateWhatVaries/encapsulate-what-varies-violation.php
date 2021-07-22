<?php

declare(strict_types=1);

namespace OOP\Principles\Other\EncapsulateWhatVariesViolation;

class Money
{
    public function __construct(private float $amount, private string $currency = 'USD') {}

    public function getAmount(): float
    {
        return round(num: $this->amount, precision: 2);
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getFormattedAmount(): string
    {
        return $this->getAmount() . " $this->currency";
    }
}

class Product
{
    public function __construct(private string $name, private Money $netPrice) {}

    public function getDescription(): string
    {
        // Problem: tax calculation varies - it depends on a country, kind of a product and might change over time
        $grossAmount = $this->netPrice->getAmount() * 1.23; // hard-coded rate and calculation algorithm
        $grossPrice = new Money(amount: $grossAmount, currency: $this->netPrice->getCurrency());
        return "$this->name costs {$grossPrice->getFormattedAmount()} (including taxes)";
    }
}

$price = new Money(amount: 99.99);
$chair = new Product(name: 'Chair', netPrice: $price);
echo $chair->getDescription() . PHP_EOL;