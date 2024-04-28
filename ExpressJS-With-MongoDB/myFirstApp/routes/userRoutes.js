const express = require("express");
const router = express.Router();

const {userHomePage,userAboutPage} = require("../controllers/userController");

/*
// Home page route.
router.get("/", function (req, res) {
  res.send("User home page");
});

// About page route.
router.get("/about", function (req, res) {
  res.send("User about page ");
});
*/

router.route("/").get(userHomePage);
router.route("/about").get(userAboutPage);

module.exports = router;