
const express = require('express');
// require path 

/*const path = require('path');

const dotenv = require('dotenv');
*/

const cookie = require('cookie-parser');

const session = require('express-session');

// middleware 

//const middleware = require('middleware');

const flash = require('express-flash');


// body-parser
const bodyParser = require('body-parser');

const app = express();
// main router 
const mainRouter = require('./routes/pages');

// 2nd router

const authRouter = require('./routes/auth');
const cookieParser = require('cookie-parser');

//test router

//const insertRouter = require('./routes/insert');


//define port 
const port = process.env.port || 4000;


// view engine  ejs
app.set('view engine' , 'ejs');



app.use(express.json());
app.use(express.urlencoded({extended : false}));
app.use(cookieParser());
app.use(express.static('public'));


app.use(session({
  secret : '123456sg',
  resave : false,
  saveUninitialized : false,
  cookie : {maxAge : 60000}
}))

app.use(flash());


app.use(mainRouter);

app.use(authRouter);



//app.use(insertRouter);

app.use((req,res,next) => {
    res.status(404).render('404',{

      title : 'MHLMS - 404 PAGE NOT FOUND',

    });
  });

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});




