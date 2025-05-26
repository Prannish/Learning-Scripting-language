<?php
class Car {
    public $color;

    public function setColor($c) {
        $this->color = $c;
    }

    public function getColor() {
        return $this->color;
    }
}

$car1 = new Car();
$car1->setColor("Red");
echo $car1->getColor(); // Output: Red
?>