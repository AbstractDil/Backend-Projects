
<?php

session_start() ;

// display session message

if(isset($_SESSION['msg'])){
    echo "<script>alert('".$_SESSION['msg']."')</script>";
    unset($_SESSION['msg']);
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/site.webmanifest">
    <title>
    <?php
    if($page == ''){
        echo 'Home - Welcome to Mr. Deb Restaurant';
    }
    elseif($page == 'home'){
        echo 'Home - Welcome to Mr. Deb Restaurant';
    }
    elseif($page =='about-us'){
        echo 'About Us - Welcome to Mr. Deb Restaurant';
    }
    elseif($page == 'contact-us'){
        echo 'Contact Us - Welcome to Mr. Deb Restaurant';
    }
    elseif($page == 'signup'){
        echo 'Sign Up - Welcome to Mr. Deb Restaurant';
    }
    elseif($page =='signin'){
        echo 'Sign In - Welcome to Mr. Deb Restaurant';
    }

    elseif($page == 'signout'){
        echo 'Confirm Sign Out - Welcome to Mr. Deb Restaurant';
    }

    elseif($page =='menu'){
        echo 'Menu - Welcome to Mr. Deb Restaurant';
    
  }

    elseif($page =='profile'){
        echo 'Profile - Welcome to Mr. Deb Restaurant';
      
  }
  elseif($page =='cart'){
    echo 'My Cart- Welcome to Mr. Deb Restaurant';
  
}

elseif($page =='my-orders'){

    echo 'My Orders - Welcome to Mr. Deb Restaurant';

}
    else{
        echo '404 Page Not Found - Welcome to Mr. Deb Restaurant';
    }
    ?>
    </title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="./assets/bootstrap-4.6.2/css/bootstrap.min.css">
     <!-- Font Awesome Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <!-- jQuery library -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="./assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>

<script>
window.onload = function() {
  document.getElementById('preLoader').style.transition = "all 2s ease-in-out";
  document.getElementById('preLoader').style.opacity = "0";
  document.getElementById('preLoader').style.visibility = "hidden";
}
</script>

</head>
<body>

<!-- Preloader -->
<div id="preLoader">
<button class="btn btn-light" type="button" id="loading" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
   Please Wait...
</button>

</div>

    <!-- Navbar Starts -->
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow">

    <button class="navbar-toggler collapsed btn-sm " type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="padding:0px 0px 0px 2px !important;">
         
         <i class="fa fa-bars text-primary"></i>
         </button>
      <a class="navbar-brand " href="?p=home">
        <img src="assets/images/logo-3.png" width="150" height="50" class="logo" alt="">
      
      </a>

      <!-- show my cart for mobile  -->

      <a class="btn btn-outline-success  rounded-pill  d-md-none" 
              href="?p=cart"
              >
              <i class='fa fa-shopping-cart' style='font-size:20px;'></i>
             
             <?php
                if(isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true){
                    include('./config/database.php');
                    $uid = $_SESSION["uid"];
                    $sql = "SELECT * FROM cart_tbl where user_id = '$uid'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        echo "<span class='badge badge-danger rounded-pill'>$count</span>";
                    }
                    else{
                      echo "Cart";
                    }
                }
                else {
                  echo "Cart";
                }

                ?>
              </a>

              <a class="btn  btn-warning rounded-pill d-md-none" 
              href="<?php echo isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true ? '?p=profile' : '?p=signin'?>"
              >
                <i class="fa fa-user"></i>
            </a>

            <?php 

           echo isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true ?

            '<a class="btn btn-danger rounded-pill d-md-none" href="javascript:void(0);" onclick="confirm(\'Are you sure you want to sign out?\') ? window.location.href=\'?p=signout\' : false;">
            <span>
            <i class=\'fa fa-power-off\'></i>
              

            </span>

            </a>' : ''

            ?>

      <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto px-3">
          <li class="nav-item  py-2
            <?php
            if($page == ''){
                echo 'active';
            }
            if($page == 'home'){
                echo 'active';
            }
            ?>

          ">
            <a class="nav-link " href="?p=home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item py-2
            <?php
            if($page =='about-us'){
                echo 'active';
            }
            ?>
          ">
            <a class="nav-link" href="?p=about-us">About</a>
          </li>

         

          <li class="nav-item py-2 
            <?php
            if($page == 'contact-us'){
                echo 'active';
            }
            ?>
          ">
            <a class="nav-link" href="?p=contact-us">Contact Us</a>
          </li>

          <li class="nav-item py-2 
            <?php
            if($page == 'signup'){
                echo 'active';
            }
            ?>
          ">

          <li class="nav-item py-2 
            <?php
            if($page == 'menu'){
                echo 'active';
            }
            ?>
          ">
            <a class="nav-link" href="?p=menu">
            <i class="fa fa-cutlery"></i>
            Menu
            </a>
          </li>

          <li class="nav-item py-2">
             <!-- my cart -->

          <a class="btn btn-outline-success rounded-pill mx-2 desktop-cart" 
              href="?p=cart"
              >
              <span class="px-2">
              <i class='fa fa-shopping-cart'></i>
                My Cart

                <?php
                if(isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true){
                    include('./config/database.php');
                    $uid = $_SESSION["uid"];
                    $sql = "SELECT * FROM cart_tbl where user_id = '$uid'";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        echo "<span class='badge badge-danger rounded-pill'>$count</span>";
                    }
                }

                ?>

              </span>
              </a>

          </li>

          
          


          <li class="nav-item py-2 
            <?php
            if($page == 'signup'){
                echo 'active';
            }
            ?>
          ">

          <?php
          if(isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true){
              ?>

              <!-- Show username -->

              <a class="btn btn-info rounded-pill mx-2 " 
              href="?p=profile"
              >
              <span class="px-2">
              <i class='fa fa-user-circle'></i>
                <?php
                echo "Welcome " .$_SESSION["fname"];
                ?>
              </span>
              </a>
              
              <a class="btn btn-danger rounded-pill mx-2" href="javascript:void(0);" onclick="confirm('Are you sure you want to sign out?') ? window.location.href='?p=signout' : false;">
              <span class="px-2">
              <i class='fa fa-sign-out'></i>
                Sign Out
              </span>
              </a>'
              <?php
          }
          else{
             
          ?>
            <a class="btn btn-violet rounded-pill mx-2" href="?p=signup">
              <span class="px-3">
                Sigup
              </span>
            </a>
          </li>
          
          <li class="nav-item py-2
            <?php
            if($page =='signin'){
                echo 'active';
            }
            ?>
          ">
            <a class="btn  btn-warning rounded-pill mx-2" href="?p=signin">
              <span class="px-3">

                Sigin
              </span>
            </a>
          </li>
          <?php
          }
          ?>
        </ul>
        <!-- <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
  </header>
    <!-- Navbar Ends -->