<?php

declare(strict_types=1);

namespace OOP\Principles\Basic\WithoutPolymorphism;

class Rectangle
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

class Triangle
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
$rectangle = new Rectangle(3, 4);
$printer->displayRectangleSurface($rectangle);

echo 'Triangle:' . PHP_EOL;
$triangle = new Triangle(3, 4);
$printer->displayTriangleSurface($triangle);