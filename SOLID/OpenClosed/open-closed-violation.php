<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\OpenClosedViolation;

use RuntimeException;

// To extend functionality by adding support for .org extension it is required to modify the Domain class.
// This way the class is being opened for modification, thus violating the Open-Closed principle.
final class Domain
{
    public const COM = '.com';
    public const ORG = '.org';

    public function getPrice(string $extension): float
    {
        return match ($extension) {
            self::COM => 9.95,
            self::ORG => 4.95, // extended functionality
            default => throw new RuntimeException(message: "$extension is not supported"),
        };
    }
}

$domain = new Domain();
echo ".com price: {$domain->getPrice(extension: Domain::COM)}" . PHP_EOL;
echo ".org price: {$domain->getPrice(extension: Domain::ORG)}" . PHP_EOL;