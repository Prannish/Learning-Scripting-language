function fetchData() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const success = true;
      if (success) {
        resolve("Data loaded");
      } else {
        reject("Error loading data");
      }
    }, 1000);
  });
}

fetchData()
  .then((data) => {
    console.log("Success:", data);
  })
  .catch((error) => {
    console.log("Failed:", error);
  });