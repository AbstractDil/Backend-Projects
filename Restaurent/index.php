<?php 

session_start() ;


$page = '';

if(isset($_GET['p'])){
    $page = $_GET['p'];
}

if($page == ''){

    include ('view/header.php');
    include ('view/home.php');
    include ('view/footer.php');

}

elseif($page == 'home'){

    include ('view/header.php');
    include ('view/home.php');
    include ('view/footer.php');

}

elseif($page =='about-us'){
    include ('view/header.php');
    include ('view/about-us.php');
    include ('view/footer.php');

}

elseif($page == 'contact-us'){
    include ('view/header.php');
    include ('view/contact-us.php');
    include ('view/footer.php');

}

elseif($page == 'profile'){

    // if user is not logged in then redirect to home page

    if(!isset($_SESSION["is_login"]) || $_SESSION["is_login"] != true){
        // redirect to home page
        header("location: ?p=home");
     
    }

    include('config/database.php');
    include ('view/header.php');
    include ('view/profile.php');
    include ('view/footer.php');

}

elseif($page == 'menu'){

    include('config/database.php');
   
    
    include ('view/header.php');
    include ('view/menu.php');
    include ('view/footer.php');

    // how to pass data to view
   

}

elseif($page == 'signup'){

    // if user is already logged in then redirect to home page

    if(isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true){
        // redirect to home page
        header("location: ?p=home");

        // display error message

        $_SESSION['msg'] = "You are already logged in.";

        exit();
     
    }
   
    
    include ('view/header.php');
    include ('view/signup.php');
    include ('view/footer.php');

    // how to pass data to view
   

}

elseif($page =='signin'){

    // if user is already logged in then redirect to home page

    if(isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true){
        // redirect to home page
        header("location: ?p=home");

        // display error message

        $_SESSION['msg'] = "You are already logged in.";

        exit();
     
    }

    include ('view/header.php');
    include ('view/signin.php');
    include ('view/footer.php');

}

elseif($page =='cart'){

    // if user is already logged in then redirect to home page

    if(!isset($_SESSION["is_login"]) && $_SESSION["is_login"] == false){
        // redirect to home page
        header("location: ?p=home");

        // display error message

        $_SESSION['msg'] = "You need to login first to view your cart.";

        exit();


     
    }
    include('config/database.php');

    include ('view/header.php');
    include ('view/cart.php');
    include ('view/footer.php');

}

elseif($page =='my-orders'){

    // if user is already logged in then redirect to home page

    if(!isset($_SESSION["is_login"]) && $_SESSION["is_login"] == false){
        // redirect to home page
        header("location: ?p=home");

        // display error message

        $_SESSION['msg'] = "You need to login first to view your orders.";

        exit();


     
    }
    include('config/database.php');

    include ('view/header.php');
    include ('view/my-orders.php');
    include ('view/footer.php');

}

elseif($page =='signout'){

    // if user is not logged in then redirect to home page

    if(!isset($_SESSION["is_login"]) || $_SESSION["is_login"] != true){
        // redirect to home page
        header("location: ?p=home");

        // display error message

        $_SESSION['msg'] = "You are not logged in.";

        exit();
     
    }

    
  include('view/header.php');
    include('view/signout.php');
    include('view/footer.php');
    

}





else{
    include ('view/header.php');
    include ('view/404.php');
    include ('view/footer.php');

}

?>