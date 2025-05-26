let CanEat = {
  eat() {
    console.log("Eating");
  }
};

let CanWalk = {
  walk() {
    console.log("Walking");
  }
};

class Person {}
Object.assign(Person.prototype, CanEat, CanWalk);

const p = new Person();
p.eat();  // Eating
p.walk(); // Walking