<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\DependencyInversion;

class Car
{
    // Car class is decoupled from CombustionEngine and ElectricEngine - it has no direct reference to them
    private Engine $engine; // a car relies on abstraction (ie. interface)

    public function __construct(Engine $engine)
    {
        $this->engine = $engine; // no hard-coded dependency - an engine is produced externally
    }

    public function start(): void
    {
        $this->engine->turnOn(); // a car uses - or depends on - the engine
    }
}

interface Engine // abstraction does not depend on concretions
{
    function turnOn(): void;
}

class CombustionEngine implements Engine // a combustion engine relies on abstraction (ie. interface)
{
    function turnOn(): void
    {
        echo "Starting ignition..." . PHP_EOL;
    }
}

class ElectricEngine implements Engine // an electric engine relies on abstraction (ie. interface)
{
    function turnOn(): void
    {
        echo "Turning power on..." . PHP_EOL;
    }
}

// A car can be assembled with a combustion engine:
$combustionEngine = new CombustionEngine();
$car = new Car($combustionEngine); // car's dependency (combustion engine) is injected via a constructor parameter
$car->start();

// A car can be assembled with an electric engine as well:
$electricEngine = new ElectricEngine();
$car = new Car($electricEngine); // car's dependency (electric engine) is injected via a constructor parameter
$car->start();

// any future engines - like HydrogenCombustionEngine - may be easily injected if they implement Engine interface