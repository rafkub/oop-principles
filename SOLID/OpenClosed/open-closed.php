<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\OpenClosed;

interface DomainPrice
{
    function getPrice(): float;
}

class ComDomain implements DomainPrice
{
    public function getPrice(): float
    {
        return 9.95;
    }
}

// to support .org extension no existing code modification is required, rather a new class is created
class OrgDomain implements DomainPrice
{
    public function getPrice(): float
    {
        return 4.95;
    }
}

$domain = new ComDomain();
echo ".com price: {$domain->getPrice()}" . PHP_EOL;
$domain = new OrgDomain();
echo ".org price: {$domain->getPrice()}" . PHP_EOL;