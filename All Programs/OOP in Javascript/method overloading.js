class Parent {
  show() {
    console.log("Parent show");
  }
}

class Child extends Parent {
  show() {
    console.log("Child show");
  }
}

const c = new Child();
c.show(); // Child show