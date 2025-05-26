class Car {
  constructor(model, year) {
    this.model = model;
    this.year = year;
  }

  info() {
    console.log(`${this.model} - ${this.year}`);
  }
}

const car1 = new Car("Tesla", 2024);
car1.info(); // Tesla - 2024