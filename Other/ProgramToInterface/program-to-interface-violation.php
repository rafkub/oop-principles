<?php

declare(strict_types=1);

namespace OOP\Principles\Other\ProgramToInterfaceViolation;

use RuntimeException;

// Concrete classes:
class PowerShell
{
    public function createFile(string $name): void
    {
        echo "Running `New-Item -Path . -Name '$name' -ItemType \"file\"` command..." . PHP_EOL;
    }
}

class Bash
{
    public function createFile(string $name): void
    {
        echo "Running `touch $name` command..." . PHP_EOL;
    }
}

function clientCode(string $shellType): void
{
    if ($shellType === 'PowerShell') {
        $shell = new PowerShell(); // client code is aware of concrete classes
    } elseif ($shellType === 'Bash') {
        $shell = new Bash();
    } else {
        throw new RuntimeException(message: "'$shellType' is not supported.");
    }
    $shell->createFile('test.txt');
}

clientCode(shellType: 'PowerShell');
// or
clientCode(shellType: 'Bash');