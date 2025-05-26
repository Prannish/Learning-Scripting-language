function stepOne() {
  return new Promise((resolve) => {
    setTimeout(() => {
      console.log("Step 1 complete");
      resolve("Data from step 1");
    }, 1000);
  });
}

function stepTwo(prevData) {
  return new Promise((resolve) => {
    setTimeout(() => {
      console.log("Step 2 complete, received:", prevData);
      resolve("Data from step 2");
    }, 1000);
  });
}

function stepThree(prevData) {
  return new Promise((resolve) => {
    setTimeout(() => {
      console.log("Step 3 complete, received:", prevData);
      resolve("All steps done");
    }, 1000);
  });
}

// Chaining the promises
stepOne()
  .then(stepTwo)
  .then(stepThree)
  .then((finalResult) => {
    console.log("Final result:", finalResult);
  })
  .catch((err) => {
    console.log("Error:", err);
  });