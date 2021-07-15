<?php

declare(strict_types=1);

namespace OOP\Principles\Other\Composition;

interface Shape // interface of the objects being composed
{
    function getArea(): float;
}

// The objects being composed:
class Rectangle implements Shape
{
    public function __construct(private float $width, private float $height) {}

    public function getArea(): float
    {
        return $this->width * $this->height;
    }
}

class Circle implements Shape
{
    public function __construct(private float $radius) {}

    public function getArea(): float
    {
        return pi() * $this->radius ** 2;
    }
}

class Window // Window does not extend Rectangular nor Circular class
{
    public function __construct(private Shape $shape) {} // shape is a contained object

    public function getArea(): float
    {
        return $this->shape->getArea(); // code reuse is still possible; explicit forwarding call to shape is required
    }
}

// Technically, an aggregation is used here and not composition:
$rectangle = new Rectangle(width: 4.3, height: 2.1);
$window = new Window(shape: $rectangle); // dynamic composition is possible; window's shape is decided at runtime
echo "Rectangular window's area: " . $window->getArea() . PHP_EOL;

$circle = new Circle(radius: 2.1);
$window = new Window(shape: $circle); // window can be also circular
echo "Circular window's area: " . $window->getArea() . PHP_EOL;