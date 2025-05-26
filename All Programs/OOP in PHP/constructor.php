<?php
class Person {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function greet() {
        echo "Hello, my name is $this->name.";
    }
}

$p = new Person("John");
$p->greet(); // Output: Hello, my name is John.
?>