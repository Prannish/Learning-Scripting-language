const animal = {
  speak() {
    console.log("Animal speaks");
  }
};

const dog = Object.create(animal);
dog.speak(); // Animal speaks