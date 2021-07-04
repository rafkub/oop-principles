<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\Abstraction;

class Tea
{
    private function boilWater(): void // specific steps are unreachable for client code
    {
        echo 'Boiling water...' . PHP_EOL;
    }

    private function brew(): void
    {
        echo 'Brewing...' . PHP_EOL;
    }

    private function addSugar(): void
    {
        echo 'Adding sugar...' . PHP_EOL;
    }

    private function addMilk(): void
    {
        echo 'Adding milk...' . PHP_EOL;
    }

    public function make(): void // this method abstracts the process of making a tea
    {
        // implementation of the method can be changed without affecting client code
        $this->boilWater();
        $this->brew();
        $this->addSugar();
        $this->addMilk(); // for example addLemon() might be used instead of addMilk()
    }
}

$tea = new Tea();
// Knowledge of specific steps or their order is NOT required in order to make a tea:
$tea->make(); // object usage is simplified