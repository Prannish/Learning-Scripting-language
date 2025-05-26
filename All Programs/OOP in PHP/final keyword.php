<?php
final class Base {
    public function sayHi() {
        echo "Hi";
    }
}

// class Child extends Base {} // Error: Cannot extend final class

$b = new Base();
$b->sayHi(); // Output: Hi
?>