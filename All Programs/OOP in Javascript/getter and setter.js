class User {
  constructor(name) {
    this._name = name;
  }

  get name() {
    return this._name.toUpperCase();
  }

  set name(value) {
    if (value.length > 0) this._name = value;
  }
}

const u = new User("john");
console.log(u.name); // JOHN
u.name = "mike";
console.log(u.name); // MIKE