<?php
class Auto
{
    protected int $speed;

    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function __toString(): string
    {
        return get_class($this) . ': ' . $this->speed . ' ';
    }
}

class Bus extends Auto
{
}

class Car extends Auto
{
}

class Bike extends Auto
{
}

$bus = new Bus();
$bus->setSpeed(80);
echo $bus; // Bus: 80

$car = new Car();
$car->setSpeed(120);
echo $car; // Car: 120

$bike = new Bike();
$bike->setSpeed(30);
echo $bike;