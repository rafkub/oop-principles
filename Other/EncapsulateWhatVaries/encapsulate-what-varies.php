<?php

declare(strict_types=1);

namespace OOP\Principles\Other\EncapsulateWhatVaries;

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

class TaxCalculator
{
    public function __construct(protected float $taxRate) {}

    public function getGrossAmount(Money $netAmount): Money
    {
        $grossAmount = $netAmount->getAmount() * (1 + $this->taxRate / 100);
        return new Money(amount: $grossAmount, currency: $netAmount->getCurrency());
    }
}

class IrishVatTaxCalculator extends TaxCalculator
{
    public function __construct()
    {
        parent::__construct(taxRate: 23);
    }
}

class NYCSalesTaxCalculator extends TaxCalculator
{
    public function __construct()
    {
        parent::__construct(taxRate: 8.875); // tax rate is encapsulated and it can be changed
    }
}

class NYCClothingSalesTaxCalculator extends NYCSalesTaxCalculator
{
    public function getGrossAmount(Money $netAmount): Money // tax calculation algorithm is encapsulated as well
    {
        if ($netAmount->getAmount() < 110) {
            $this->taxRate -= 4;
        }
        return parent::getGrossAmount(netAmount: $netAmount);
    }
}

class Product
{
    public function __construct(private string $name, private Money $netPrice, private TaxCalculator $taxCalculator) {}

    public function getDescription(): string
    {
        // Side note: notice that guidelines of Principle of Least Knowledge are not applied here.
        // However, the Product class is already aware of Money (see a constructor parameter list), so there is no harm
        // in violating them. OOP principles are not strict laws that have to be blindly followed in each and every case
        $grossPrice = $this->taxCalculator->getGrossAmount(netAmount: $this->netPrice);
        return "$this->name costs {$grossPrice->getFormattedAmount()} (including taxes)";
    }
}

$price = new Money(amount: 99.99, currency: 'EUR');
$irishVatTaxCalculator = new IrishVatTaxCalculator();
$chair = new Product(name: 'Chair', netPrice: $price, taxCalculator: $irishVatTaxCalculator);
echo $chair->getDescription() . PHP_EOL;

$price = new Money(amount: 99.99);
$nycSalesTaxCalculator = new NYCSalesTaxCalculator();
$chair = new Product(name: 'Chair', netPrice: $price, taxCalculator: $nycSalesTaxCalculator);
echo $chair->getDescription() . PHP_EOL;

$price = new Money(amount: 29.99);
$nycClothingSalesTaxCalculator = new NYCClothingSalesTaxCalculator();
$t_shirt = new Product(name: 'T-shirt', netPrice: $price, taxCalculator: $nycClothingSalesTaxCalculator);
echo $t_shirt->getDescription() . PHP_EOL;