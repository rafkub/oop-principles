<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\OpenClosedViolation;

use RuntimeException;

// to extend functionality by adding support for .org extension it is required to modify the Domain class
// the class is being opened for modification, thus violating the Open-Closed principle
final class Domain
{
    public const COM = '.com';
    public const ORG = '.org';

    public function getPrice(string $extension): float
    {
        switch ($extension) {
            case self::COM:
                return 9.95;
            case self::ORG: // extended functionality
                return 4.95;
            default:
                throw new RuntimeException("$extension is not supported");
        }
    }
}

$domain = new Domain();
echo ".com price: {$domain->getPrice(Domain::COM)}" . PHP_EOL;
echo ".org price: {$domain->getPrice(Domain::ORG)}" . PHP_EOL;