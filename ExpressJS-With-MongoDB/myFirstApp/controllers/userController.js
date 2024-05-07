const User = require("../models/userModel.js");


const userHomePage = async (req, res) => {
  res.status(200).json({ msg: "Welcome to user home page" });
};

const userAboutPage = async (req, res) => {
  res.status(200).json({ msg: "Welcome to user about page" });
};

const userRegistration = async (req, res) => {

  //res.status(200).json({ msg: "User Registration Post Request" });

  console.log(req.body);
  
  const { fullname, email, password, cpassword } = req.body;

  
    try {
      // Validate required fields
      if (!fullname) {
        return res.status(400).json({ error: "Fullname is required" });
      }
      if (!email) {
        return res.status(400).json({ error: "Email is required" });
      }
      if (!password) {
        return res.status(400).json({ error: "Password is required" });
      }
      if (!cpassword) {
        return res.status(400).json({ error: "Confirmed password is required" });
      }
  
      // Check if passwords match
      if (password !== cpassword) {
        return res.status(400).json({ error: "Passwords do not match" });
      }
  
      // Create a new user instance
      const newUser = new User({
        fullname,
        email,
        password,
        cpassword
      });
  
      // Save the user to the database
      const savedUser = await newUser.save();
  
      res
        .status(201)
        .json({ msg: "User registered successfully", user: savedUser });
    } catch (error) {
      // Centralized error handling
      console.error("Error in userRegistration:", error);
      res.status(500).json({ error: "Internal server error" });
    }
  };
module.exports = { userAboutPage, userHomePage, userRegistration };
