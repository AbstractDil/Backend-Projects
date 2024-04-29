const mysql = require('mysql');
const connection = mysql.createConnection({

  host:'localhost',
  user : 'root',
  password : '',
  database :'nodejs'


});

connection.connect(function(err){
  if(err) throw err;
  console.log('Connected Successfully');
});

module.exports = connection;
