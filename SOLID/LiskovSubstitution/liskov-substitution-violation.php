<?php

declare(strict_types=1);

namespace OOP\Principles\SOLID\LiskovSubstitutionViolation;

use RuntimeException;

abstract class Bird
{
    abstract public function makeSound(): void;

    public function fly(): void
    {
        echo 'A bird can fly.' . PHP_EOL;
    }
}

class Duck extends Bird
{
    public function makeSound(): void
    {
        echo 'Quack!' . PHP_EOL;
    }
}

class Ostrich extends Bird // requires reimplementation of fly() method
{
    public function makeSound(): void
    {
        echo 'Boom or hiss.' . PHP_EOL;
    }

    public function fly(): void // implementing this method for an ostrich does not make sense
    {
        throw new RuntimeException('Sorry, an ostrich cannot fly...');
    }
}

class Hummingbird extends Bird // requires implementation of makeSound() method
{
    public function makeSound(): void  // implementing this method for a hummingbird does not make sense
    {
        throw new RuntimeException('Sorry, a hummingbird cannot make a sound...');
    }

    public function fly(): void
    {
        echo 'A hummingbird can fly in all directions, including backwards and upside down!' . PHP_EOL;
    }
}

class BirdWatcher
{
    public function watchFlying(Bird $bird)
    {
        $bird->fly();
    }

    public function listen(Bird $bird)
    {
        $bird->makeSound();
    }
}

$birdWatcher = new BirdWatcher();

$duck = new Duck();
$ostrich = new Ostrich();
$hummingbird = new Hummingbird();

$birdWatcher->watchFlying($duck);
// $birdWatcher->watchFlying($ostrich); // a bird is not replaceable by an ostrich; throws a runtime exception
$birdWatcher->watchFlying($hummingbird);

$birdWatcher->listen($duck);
$birdWatcher->listen($ostrich);
// $birdWatcher->listen($hummingbird); // a bird is not replaceable by a hummingbird; throws a runtime exception