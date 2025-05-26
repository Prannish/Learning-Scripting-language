<?php
class Animal {
    public function makeSound() {
        echo "Some sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark";
    }
}

$d = new Dog();
$d->makeSound(); // Output: Bark
?>