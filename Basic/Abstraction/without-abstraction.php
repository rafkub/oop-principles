<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\WithoutAbstraction;

class Tea
{
    public function boilWater(): void
    {
        echo 'Boiling water...' . PHP_EOL;
    }

    public function brew(): void
    {
        echo 'Brewing...' . PHP_EOL;
    }

    public function addSugar(): void
    {
        echo 'Adding sugar...' . PHP_EOL;
    }

    public function addMilk(): void
    {
        echo 'Adding milk...' . PHP_EOL;
    }
}

$tea = new Tea();
// Knowledge of specific steps and their order is required in order to make a tea:
$tea->boilWater();
$tea->brew();
$tea->addSugar();
$tea->addMilk(); // client code has to change if the method of making tea changes, like adding lemon instead of milk