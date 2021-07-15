<?php

declare(strict_types=1);

namespace OOP\Principles\Other\Inheritance;

class Rectangle
{
    public function __construct(private float $width, private float $height) {}

    public function getArea(): float
    {
        return $this->width * $this->height;
    }
}

class Circle
{
    public function __construct(private float $radius) {}

    public function getArea(): float
    {
        return pi() * $this->radius ** 2;
    }
}

class Window extends Rectangle // window's shape is defined statically and can only be rectangular
{
    public function __construct(float $width, float $height)
    {
        parent::__construct(width: $width, height: $height);
    }
}

$window = new Window(width: 4.3, height: 2.1); // window cannot be circular
echo "Rectangular window's area: " . $window->getArea() . PHP_EOL; // code reuse is possible; getArea() is inherited