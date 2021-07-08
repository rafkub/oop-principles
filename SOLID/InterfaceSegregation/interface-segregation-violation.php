<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\InterfaceSegregationViolation;

use RuntimeException;

interface Car
{
    function changeBrakePads(): void;
    function changeOil(): void;
}

class EngineCar implements Car
{
    public function changeBrakePads(): void
    {
        echo 'Changing brake pads...' . PHP_EOL;
    }

    public function changeOil(): void
    {
        echo 'Changing oil...' . PHP_EOL;
    }
}

class ElectricCar implements Car
{
    public function changeBrakePads(): void
    {
        echo 'Changing brake pads...' . PHP_EOL;
    }

    // ElectricCar class should not need to implement the changeOil() method
    public function changeOil(): void // future change to method's signature in the Car interface requires a change here
    {
        throw new RuntimeException('Impossible action!'); // might also do nothing
    }
}

$engineCar = new EngineCar();
echo 'Engine car:' . PHP_EOL;
$engineCar->changeBrakePads();
$engineCar->changeOil();

$electricCar = new ElectricCar();
echo 'Electric car:' . PHP_EOL;
$electricCar->changeBrakePads();
// $electricCar->changeOil(); // throws a runtime exception or does nothing