<?php

declare(strict_types=1);

namespace OOP\Principles\Other\LeastKnowledge;

class House
{
    private Oven $oven;

    public function __construct()
    {
        $this->oven = new Oven();
    }

    public function turnOvenOn(): void
    {
        $this->oven->turnOn(); // calling method on the object that House instantiates
    }
}

class Oven
{
    public function turnOn()
    {
        echo 'Oven turned on.' . PHP_EOL;
    }
}

$house = new House();
$house->turnOvenOn(); // client code is decoupled from oven; if oven's interface changes, client has not to be amended