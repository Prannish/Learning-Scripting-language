function divideNumbers(a, b) {
  try {
    if (typeof a !== 'number' || typeof b !== 'number') {
      throw new Error("Inputs must be numbers.");
    }

    if (b === 0) {
      throw new Error("Cannot divide by zero.");
    }

    let result = a / b;
    console.log(`Result: ${result}`);
  } catch (error) {
    console.log(`Error: ${error.message}`);
  } finally {
    console.log("Operation completed.");
  }
}

// Test Cases
divideNumbers(10, 2);      // Result: 5
divideNumbers(10, 0);      // Error: Cannot divide by zero.
divideNumbers("a", 5);     // Error: Inputs must be numbers.