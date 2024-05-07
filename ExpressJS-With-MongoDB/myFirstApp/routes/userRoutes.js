// routes/userRoutes.js

const express = require('express');
const router = express.Router();
const { userAboutPage, userHomePage, userRegistration } = require('../controllers/userController');

// Define routes
router.get('/', userHomePage);
router.get('/about', userAboutPage);
router.post('/register', userRegistration);

module.exports = router;
