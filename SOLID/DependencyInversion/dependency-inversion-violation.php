<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\DependencyInversionViolation;

class Car
{
    // a car relies on concretion (ie. a concrete class)
    public function __construct(private CombustionEngine $engine) {}

    public function start(): void
    {
        $this->engine->turnOn(); // a car uses - or depends on - the engine
    }
}

class CombustionEngine
{
    public function turnOn(): void
    {
        echo "Starting ignition..." . PHP_EOL;
    }
}

class ElectricEngine
{
    public function turnOn(): void
    {
        echo "Turning power on..." . PHP_EOL;
    }
}

// A car can be assembled only with a combustion engine and not with an electric one:
$combustionEngine = new CombustionEngine();
$car = new Car(engine: $combustionEngine);
$car->start();

// NOTE:
// An engine is injected into the Car's constructor using a technique called dependency injection
// but it still violates Dependency Inversion Principle.