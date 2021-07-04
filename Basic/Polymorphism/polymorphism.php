<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\Polymorphism;

interface Figure // in general it could also be a class
{
    function getSurface(): float;
}

// Rectangle and Triangle classes are polymorphic - they can appear to be of a generalized type (Figure):
class Rectangle implements Figure
{
    private float $a;
    private float $b;

    public function __construct(float $a, float $b)
    {
        $this->b = $b;
        $this->a = $a;
    }

    function getSurface(): float
    {
        return $this->a * $this->b;
    }
}

class Triangle implements Figure
{
    private float $a;
    private float $h;

    public function __construct(float $a, float $h)
    {
        $this->h = $h;
        $this->a = $a;
    }

    function getSurface(): float
    {
        return $this->a * $this->h / 2;
    }
}

class Printer
{
    // This method is polymorphic - it accepts both Rectangle and Triangle:
    public function displaySurface(Figure $figure): void
    {
        echo "Surface: {$figure->getSurface()} square units." . PHP_EOL;
    }
}

$printer = new Printer();

echo 'Rectangle:' . PHP_EOL;
$rectangle = new Rectangle(3, 4);
$printer->displaySurface($rectangle);

echo 'Triangle:' . PHP_EOL;
$triangle = new Triangle(3, 4);
$printer->displaySurface($triangle);