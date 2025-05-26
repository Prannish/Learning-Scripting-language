class MyClass {
  constructor() {
    this.value = 10;
  }

  showValue() {
    console.log(this.value);
  }
}

const obj = new MyClass();
obj.showValue(); // 10