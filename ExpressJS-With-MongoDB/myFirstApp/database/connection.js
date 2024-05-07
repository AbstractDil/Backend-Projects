const mongoose = require('mongoose');

const connectDB = () => {
    console.log("Connecting to database... ");
    return mongoose.connect('mongodb://localhost:27017/', {
        dbName: 'express-mongo',
       // useNewUrlParser: true,
        //useUnifiedTopology: true 
    });
}

module.exports = connectDB;