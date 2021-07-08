<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\LiskovSubstitution;

interface Audible
{
    function makeSound(): void;
}

abstract class Flyable
{
    public function fly(): void
    {
        echo 'It can fly.' . PHP_EOL;
    }
}

class Duck extends Flyable implements Audible
{
    public function makeSound(): void
    {
        echo 'Quack!' . PHP_EOL;
    }
}

class Ostrich implements Audible // requires only implementation of a method that makes sense
{
    public function makeSound(): void
    {
        echo 'Boom or hiss.' . PHP_EOL;
    }
}

class Hummingbird extends Flyable // requires only implementation of a method that makes sense
{
    public function fly(): void // in this particular case the method has been reimplemented
    {
        echo 'A hummingbird can fly in all directions, including backwards and upside down!' . PHP_EOL;
    }
}

class BirdWatcher
{
    public function watchFlying(Flyable $bird): void // accepts only objects able to implement fly() method
    {
        $bird->fly();
    }

    public function listen(Audible $bird): void // accepts only objects able to implement makeSound() method
    {
        $bird->makeSound();
    }
}

$birdWatcher = new BirdWatcher();

$duck = new Duck();
$ostrich = new Ostrich();
$hummingbird = new Hummingbird();

$birdWatcher->watchFlying(bird: $duck);
// Static analysis - "Expected parameter of type 'Flyable', 'Ostrich' provided":
// $birdWatcher->watchFlying(bird: $ostrich);
$birdWatcher->watchFlying(bird: $hummingbird);

$birdWatcher->listen(bird: $duck);
$birdWatcher->listen(bird: $ostrich);
// Static analysis - "Expected parameter of type 'Audible', 'Hummingbird' provided":
// $birdWatcher->listen(bird: $hummingbird);