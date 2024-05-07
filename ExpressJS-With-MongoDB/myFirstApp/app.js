const express = require('express');
const bodyParser = require('body-parser');
const connectDB = require('./database/connection');
const userRoutes = require("./routes/userRoutes");

const app = express();
const port = process.env.PORT || 3000;

// Middleware to parse JSON bodies
app.use(bodyParser.urlencoded({ extended: true }));
//app.use(bodyParser.json());

// Define application routes
app.get('/', (req, res) => {
  res.send('Hello From Express Js');
});

app.get('/about', (req, res) => {
  res.send('About me');
});

app.get('/contact', (req, res) => {
  res.send('Contact with me');
});

// Use user routes
app.use("/api/user/", userRoutes);

// Error handling middleware
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).send('Something went wrong!');
  next();
});

// Start the server
const startServer = async () => {
  try {
    await connectDB();
    app.listen(port, () => {
      console.log(`App is listening on port ${port}`);
    });
  } catch (err) {
    console.error(err);
    process.exit(1); // Exit with non-zero code to indicate failure
  }
};

startServer();
