const router = require('express').Router();


router.get('/', (req, res) => {
    res.render('home', {
        title : 'MHLMS - HOME',
    });
  });

  router.get('/Home', (req, res) => {
    res.render('home', {
        title : 'MHLMS - HOME',
    });
  });

  router.get('/Registration', (req, res) => {
    res.render('registration', {
        title : 'MHLMS - REGISTRATION',
    });
  });

  router.get('/About', (req, res) => {
    res.render('about', {
        title : 'MHLMS - ABOUT',
    });
  });

  router.get('/ForgetPassword', (req, res) => {
    res.render('forget_password', {
        title : 'MHLMS - Forget Password',
    });
  });

  router.get('/OTP', (req, res) => {
    res.render('validate_otp', {
        title : 'MHLMS - Validate OTP',
    });
  });

  router.get('/insert', (req, res) => {
    res.render('insert', {
        title : 'MHLMS - Insert',
    });
  });
 

  router.get('/Login', (req, res) => {
    res.render('login', {
        title : 'MHLMS - LOGIN',
    });
  });

  





module.exports = router;