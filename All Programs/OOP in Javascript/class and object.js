class Person {
  constructor(name) {
    this.name = name;
  }

  greet() {
    console.log(`Hi, I'm ${this.name}`);
  }
}

const p1 = new Person("Alice");
p1.greet(); // Hi, I'm Alice