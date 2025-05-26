class Demo {
  #secret = "hidden";

  #showSecret() {
    console.log(this.#secret);
  }

  reveal() {
    this.#showSecret();
  }
}

const d = new Demo();
d.reveal(); // hidden
// d.#showSecret(); // Error