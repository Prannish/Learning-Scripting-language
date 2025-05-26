<?php
class Shape {
    public function draw() {
        echo "Drawing shape";
    }
}

class Circle extends Shape {
    public function draw() {
        echo "Drawing circle";
    }
}

class Square extends Shape {
    public function draw() {
        echo "Drawing square";
    }
}

function renderShape(Shape $shape) {
    $shape->draw();
}

renderShape(new Circle()); // Output: Drawing circle
renderShape(new Square()); // Output: Drawing square
?>