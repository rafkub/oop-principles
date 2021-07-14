<?php

declare(strict_types=1);

namespace OOP\Principles\Other\LeastKnowledgeViolation;

class House
{
    private Oven $oven;

    public function __construct()
    {
        $this->oven = new Oven();
    }

    public function getOven(): Oven
    {
        return $this->oven;
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
$house->getOven()->turnOn(); // client code is coupled with oven; if oven's interface changes, client has to be amended