fetch('http://localhost:3000/api/user/register', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      fullname: 'John Doe', // Ensure this field is included
      email: 'john@example.com',
      password: 'password123',
      cpassword: 'password123'
    }),
  })
  