const express = require('express');
const app = express();

// database connection
const connectDB = require('./database/connection');

// server port 
const port = process.env.PORT || 3000;

// define routes 
const user_routes = require("./routes/userRoutes");

// application default  routes 
app.get('/', (req, res) => {
  res.send('Hello From Express Js')
})

app.get('/about', (req, res) => {
    res.send('About me')
})

app.get('/contact',(req,res) => {
    res.send('Contact with me')
})

// use middleware to set user router 
app.use("/user/",user_routes);


// start server function 
const startServer = async(req,res) => {
  try{
     await connectDB();
    app.listen(port, () => {
      console.log(`App is listening on port ${port}`)
    });
  }
  catch(err){
    console.log(err);
  }

};

startServer(); // call the function to start the server
