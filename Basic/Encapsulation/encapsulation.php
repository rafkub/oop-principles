<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\Encapsulation;

class Dog
{
    private int $weight = 1; // weight and mood can be managed only by a dog
    private string $mood = 'good';

    public function setWeight(int $weight): void
    {
        if ($weight > 0) { // possibility to set rules
            $this->weight = $weight;
        }
    }

    public function pet(): void
    {
        $this->mood = 'good'; // value is changed indirectly by interacting with a dog (petting and teasing it)
    }

    public function tease(): void
    {
        $this->mood = 'bad'; // mood is limited to allowed set of values ('good' and 'bad')
    }

    public function __toString(): string
    {
        return "Dog's weight is $this->weight and it's in a $this->mood mood.";
    }
}

$dog = new Dog();
echo "After dog's creation: $dog" . PHP_EOL;

$dog->tease();
echo "After teasing: $dog" . PHP_EOL;

$dog->pet();
echo "After petting: $dog" . PHP_EOL;

$newWeight = -1;
$dog->setWeight($newWeight);

echo "After setting weight to $newWeight: $dog" . PHP_EOL;
$newWeight = 5;

$dog->setWeight($newWeight);
echo "After setting weight to $newWeight: $dog" . PHP_EOL;

// Direct internal state modification is NOT possible, preventing from setting incorrect internal state:
// $dog->weight = -1; //cannot access private property
// $dog->mood = 'cold'; //cannot access private property