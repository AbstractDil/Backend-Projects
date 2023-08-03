<?php 

// Admin Panel

session_start() ;


$page = '';

$content = '';

if(isset($_GET['p']) || isset($_GET['c'])){
    $page = $_GET['p'];
    $content = $_GET['c'];
}

if($page == ''){

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['user_type'] == 1){

        header("location: ?p=dashboard&c=home");

        // display error message

        $_SESSION['msg'] = "Dear Administrator, You are already logged in.";

        exit();

    }


    include ('view/header.php');
    include ('view/login.php');
    include ('view/footer.php');

}

elseif($page == 'dashboard' && $content == 'users'){

    // if logged in is true and usertype is admin then show dashboard 

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['usertype'] == 1){

        include ('view/header.php');
        include ('view/users.php');
        include ('view/footer.php');

    }
    else{
        header("location:?p=login");

        // display error message

        $_SESSION['msg'] = "Error! You are not authorized to access this page.";

        exit();
    }

}

elseif($page == 'dashboard' && $content == 'orders'){

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['usertype'] == 1){

        include ('view/header.php');
        include ('view/orders.php');
        include ('view/footer.php');

    }
    else{
        header("location:?p=login");

        // display error message

        $_SESSION['msg'] = "Error! You are not authorized to access this page.";

        exit();
    }

   

}

elseif($page == 'dashboard' && $content == 'home'){

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['usertype'] == 1){

       include('../config/database.php');

    include ('view/header.php');
    include ('view/dashboard.php');
    include ('view/footer.php');

    }
    else{
        header("location:?p=login");

        // display error message

        $_SESSION['msg'] = "Error! You are not authorized to access this page.";

        exit();
    }

   

}

elseif($page == 'dashboard' && $content == 'products'){

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['usertype'] == 1){

        include ('view/header.php');
        include ('view/products.php');
        include ('view/footer.php');

    }
    else{
        header("location:?p=login");

        // display error message

        $_SESSION['msg'] = " Error! You are not authorized to access this page.";

        exit();
    }

  

}

elseif($page == 'dashboard' && $content == 'contact_form_data'){

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['usertype'] == 1){

        include ('view/header.php');
        include ('view/contact_form_data.php');
        include ('view/footer.php');

    }
    else{
        header("location:?p=login");

        // display error message

        $_SESSION['msg'] = " Error! You are not authorized to access this page.";

        exit();
    }

  

}


elseif($page =='login'){

    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true && $_SESSION['usertype'] == 1){

        header("location: ?p=dashboard&c=home");

        // display error message

        $_SESSION['msg'] = "Dear Administrator, You are already logged in.";

        exit();

    }


    include ('view/header.php');
    include ('view/login.php');
    include ('view/footer.php');

}

else{
    include ('view/header.php');
    include ('view/404.php');
    include ('view/footer.php');

}

?>