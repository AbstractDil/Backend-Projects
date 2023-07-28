<?php 

// Admin Panel

$page = '';

if(isset($_GET['p'])){
    $page = $_GET['p'];
}

if($page == ''){

    include ('view/header.php');
    include ('view/login.php');
    include ('view/footer.php');

}

elseif($page == 'dashboard'){

    include ('view/header.php');
    include ('view/dashboard.php');
    include ('view/footer.php');

}


elseif($page =='login'){
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