<?php
abstract class Vehicle {
    abstract public function start();
}

class Bike extends Vehicle {
    public function start() {
        echo "Bike started";
    }
}

$bike = new Bike();
$bike->start(); // Output: Bike started
?>