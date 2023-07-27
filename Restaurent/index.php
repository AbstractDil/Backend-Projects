<?php 

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

elseif($page == 'signup'){

   

    include ('view/header.php');
    include ('view/signup.php');
    include ('view/footer.php');

    // how to pass data to view
   

}

elseif($page =='signin'){
    include ('view/header.php');
    include ('view/signin.php');
    include ('view/footer.php');

}

else{
    include ('view/header.php');
    include ('view/404.php');
    include ('view/footer.php');

}

?>