function fetchData(callback) {
  setTimeout(() => {
    console.log("Data fetched!");
    callback("User data");
  }, 1000);
}

function handleData(data) {
  console.log("Processing:", data);
}

fetchData(handleData);