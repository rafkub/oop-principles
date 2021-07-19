<?php

declare(strict_types=1);

namespace OOP\Principles\Other\ProgramToInterface;

// "Interface":
abstract class Shell
{
    abstract public function createFile(string $name): void;
}

// Concrete classes:
class PowerShell extends Shell
{
    public function createFile(string $name): void
    {
        echo "Running `New-Item -Path . -Name '$name' -ItemType \"file\"` command..." . PHP_EOL;
    }
}

class Bash extends Shell
{
    public function createFile(string $name): void
    {
        echo "Running `touch $name` command..." . PHP_EOL;
    }
}

function clientCode(Shell $shell): void // client code is aware only of an interface
{
    $shell->createFile(name: 'test.txt');
}

// Application configuration or entry point decides which concrete class to create:
clientCode(shell: new PowerShell());
// or
clientCode(shell: new Bash());