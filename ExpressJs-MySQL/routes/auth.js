
const router = require('./pages');



const authrouter = require('express').Router();

const db = require('./dbconnect');

router.post('/insert', function(req, res) {


    var name = req.body.uname;
    var email = req.body.uemail;
    var pwd = req.body.upwd;
   
    // console.log(req.body);
   
    var sql = `INSERT INTO user (name, email, password) VALUES ("${name}",  "${email}", "${pwd}")`;
    db.query(sql, function(err, result) {
      if (err) throw err;
      console.log('Record Inserted');
      req.flash('success','Record inserted successfully');
      res.redirect('/insert');
    });
  });

















module.exports = authrouter;
