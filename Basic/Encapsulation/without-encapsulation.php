<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\WithoutEncapsulation;

class Dog
{
    public int $weight = 1;
    public string $mood = 'good';
}

$dog = new Dog();

// Direct internal state modification is possible, even if it does not make sense or shouldn't be directly accessible:
$dog->weight = -1;
$dog->mood = 'cold';
echo "Dog's weight is $dog->weight and it's in a $dog->mood mood." . PHP_EOL;