class Animal {
  speak() {
    console.log("Some generic sound");
  }
}

class Dog extends Animal {
  speak() {
    console.log("Bark");
  }
}

const dog = new Dog();
dog.speak(); // Bark