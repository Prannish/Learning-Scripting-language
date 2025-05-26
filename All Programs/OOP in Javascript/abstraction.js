class Vehicle {
  constructor() {
    if (this.constructor === Vehicle) {
      throw new Error("Abstract class can't be instantiated");
    }
  }

  start() {
    throw new Error("Method 'start()' must be implemented.");
  }
}

class Bike extends Vehicle {
  start() {
    console.log("Bike started");
  }
}

const b = new Bike();
b.start(); // Bike started