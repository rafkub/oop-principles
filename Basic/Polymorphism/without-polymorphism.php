<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\WithoutPolymorphism;

class Rectangle
{
    public function __construct(private float $a, private float $b) {}

    function getSurface(): float
    {
        return $this->a * $this->b;
    }
}

class Triangle
{
    public function __construct(private float $a, private float $h) {}

    function getSurface(): float
    {
        return $this->a * $this->h / 2;
    }
}

class Printer
{
    public function displayRectangleSurface(Rectangle $rectangle): void
    {
        echo "Surface: {$rectangle->getSurface()} square units." . PHP_EOL;
    }

    public function displayTriangleSurface(Triangle $triangle): void
    {
        echo "Surface: {$triangle->getSurface()} square units." . PHP_EOL;
    }
}

$printer = new Printer();

echo 'Rectangle:' . PHP_EOL;
$rectangle = new Rectangle(a: 3, b: 4);
$printer->displayRectangleSurface(rectangle: $rectangle);

echo 'Triangle:' . PHP_EOL;
$triangle = new Triangle(a: 3, h: 4);
$printer->displayTriangleSurface(triangle: $triangle);