class Counter {
  static count = 0;

  static increment() {
    this.count++;
  }
}

Counter.increment();
Counter.increment();
console.log(Counter.count); // 2