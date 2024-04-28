/*
* User Controller Js
*/

const userHomePage = async (req,res) => {

    res.status(200).json({msg : 'Welcome to user home page'});

}

const userAboutPage = async (req,res) => {

    res.status(200).json({msg : 'Welcome to user about page'});

}

module.exports = {userAboutPage,userHomePage};