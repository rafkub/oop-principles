<?php

declare(strict_types=1);

namespace OOP\Principles\Other\LooseCoupling;

interface Device
{
    function turnOn(): void;
    function run(): void;
    function turnOff(): void;
}

class DvdPlayer implements Device
{
    public function turnOn(): void
    {
        echo 'DVD player turned on.' . PHP_EOL;
    }

    public function run(): void
    {
        $this->play();
    }

    public function turnOff(): void
    {
        echo 'DVD player turned off.' . PHP_EOL;
    }

    public function play(): void // signature of this method can be changed without a need of updating DeviceOperator
    {
        echo 'Playing a DVD...' . PHP_EOL;
    }
}

class Vehicle implements Device
{
    public function turnOn(): void
    {
        echo 'Engine on.' . PHP_EOL;
    }

    public function turnOff(): void
    {
        echo 'Engine off.' . PHP_EOL;
    }

    public function run(): void
    {
        $this->drive();
    }

    public function drive(): void // signature of this method can be changed without a need of updating DeviceOperator
    {
        echo 'Driving a vehicle...' . PHP_EOL;
    }
}

// DeviceOperator is not tightly coupled with any concrete class; it can use any type of a device implementing Device
class DeviceOperator
{
    // DeviceOperator does not contain a reference to a concrete class; it is only aware of the Device interface
    public function __construct(private Device $device) {}

    public function useDevice(): void
    {
        $this->device->turnOn(); // the dependency's "signature" can be changed (apart from interface methods)
        $this->device->run();
        $this->device->turnOff();
    }
}

$operator = new DeviceOperator(device: new DvdPlayer());
$operator->useDevice();

$operator = new DeviceOperator(device: new Vehicle()); // different dependency can be supplied
$operator->useDevice();