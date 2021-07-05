<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\InterfaceSegregation;

interface Car // more specific interface
{
    function changeBrakePads(): void;
}

interface EngineCar extends Car
{
    function changeOil(): void;
}

class OrdinaryCar implements EngineCar
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

class ElectricCar implements Car // ElectricCar class is not required to implement changeOil() method
{
    public function changeBrakePads(): void
    {
        echo 'Changing brake pads...' . PHP_EOL;
    }
}

$ordinaryCar = new OrdinaryCar();
echo 'Ordinary car:' . PHP_EOL;
$ordinaryCar->changeBrakePads();
$ordinaryCar->changeOil();

$electricCar = new ElectricCar();
echo 'Electric car:' . PHP_EOL;
$electricCar->changeBrakePads();
// $electricCar->changeOil(); // static analysis: Method 'changeOil' not found in ElectricCar