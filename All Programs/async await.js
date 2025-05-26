// Simulating a function that returns a promise (e.g., an API call)
function fetchData() {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("✅ Data fetched successfully!");
    }, 2000); // Simulate a 2-second delay
  });
}

// Async function using await
async function getData() {
  console.log("🔄 Fetching data...");
  
  try {
    const result = await fetchData(); // Wait for the promise to resolve
    console.log(result); // Logs: ✅ Data fetched successfully!
  } catch (error) {
    console.log("❌ Error:", error);
  }
}

// Call the async function
getData();