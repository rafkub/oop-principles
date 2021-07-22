<?php

declare(strict_types=1);

namespace OOP\Principles\Other\LooseCouplingViolation;

class DvdPlayer
{
    public function turnOn(): void
    {
        echo 'DVD player turned on.' . PHP_EOL;
    }

    public function play(): void
    {
        echo 'Playing a DVD...' . PHP_EOL;
    }

    public function turnOff(): void
    {
        echo 'DVD player turned off.' . PHP_EOL;
    }
}

// DeviceOperator is tightly coupled with DvdPlayer; it can only use this type of a device
class DeviceOperator
{
    private DvdPlayer $dvdPlayer; // DeviceOperator contains a reference to a concrete class

    public function __construct()
    {
        $this->dvdPlayer = new DvdPlayer(); // the dependency cannot be substituted
    }

    public function useDevice(): void
    {
        $this->dvdPlayer->turnOn(); // the dependency's "signature" cannot be changed without changing useDevice()
        $this->dvdPlayer->play();
        $this->dvdPlayer->turnOff();
    }
}

$operator = new DeviceOperator();
$operator->useDevice();