const container = document.getElementById('user-container');

fetch('https://jsonplaceholder.typicode.com/users')
  .then(res => res.json())
  .then(users => {
    container.innerHTML = ''; // Clear loading text
    users.forEach(user => {
      const card = document.createElement('div');
      card.className = 'user-card';
      card.innerHTML = `
        <h3>${user.name}</h3>
        <p><strong>Email:</strong> ${user.email}</p>
        <p><strong>City:</strong> ${user.address.city}</p>
      `;
      container.appendChild(card);
    });
  })
  .catch(error => {
    container.innerHTML = 'Failed to load users.';
    console.error(error);
  });