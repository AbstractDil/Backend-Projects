
<?php
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
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <title>
    <?php
    if($page == ''){
        echo 'Admin Panel';
    }
    elseif($page == 'dashboard' && $content == 'home'){
        echo 'Dashboard - Admin Panel';
    }
    elseif($page == 'dashboard' && $content == 'users'){
        echo 'Users - Admin Panel';
    }
    elseif($page == 'dashboard' && $content == 'orders'){
        echo 'Orders - Admin Panel';
    }
    elseif($page == 'dashboard' && $content == 'products'){
      echo 'Products - Admin Panel';
  }

  elseif($page == 'dashboard' && $content == 'contact_form_data'){
    echo 'Contact Form Data - Admin Panel';
}



    elseif($page =='login'){
        echo 'Login - Admin Panel';
    }

    else{
        echo '404';
    }


    ?>
    </title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Jquery Datatables -->

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
 
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="../assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>
<!-- Jquery Datatables -->
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
window.onload = function() {
  document.getElementById('preLoader').style.transition = "all 2s ease-in-out";
  document.getElementById('preLoader').style.opacity = "0";
  document.getElementById('preLoader').style.visibility = "hidden";
}
</script>

</head>
<body class="bg-light">

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
      <a class="navbar-brand mx-3" href="../?p=home">
        <img src="../assets/images/logo-3.png" width="120" height="50" class="logo" alt="">
      
      </a>
      <a class="btn  btn-warning rounded-pill d-md-none" 
              href="<?php echo isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true ? '?p=profile' : '?p=login'?>"
              >
                <i class="fa fa-user"></i>
            </a>

            <?php 

           echo isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true ?

            '<a class="btn btn-danger rounded-pill d-md-none" href="javascript:void(0);" onclick="confirm(\'Are you sure you want to sign out?\') ? window.location.href=\'../?p=signout\' : false;">
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
            if($page == 'dashboard' && $content == 'home'){
                echo 'active';
            }
            ?>

          ">
            <a class="nav-link " href="?p=dashboard&c=home">
              <i class="fa fa-dashboard"></i> Dashboard
              <span class="sr-only">(current)</span></a>
          </li>
         

         

          <li class="nav-item py-2 
            <?php
            if($page == 'dashboard' && $content == 'users'){
                echo 'active';
            }
            ?>
          ">
            <a class="nav-link" href="?p=dashboard&c=users">
              <i class="fa fa-users"></i> Users
            </a>
          </li>

          <li class="nav-item py-2 
            <?php
            if($page == 'dashboard' && $content == 'orders'){
                echo 'active';
            }
            ?>

          ">

            <a class="nav-link" href="?p=dashboard&c=orders">
              <i class="fa fa-cart-plus"></i> Orders
            </a>

          </li>


          <li class="nav-item py-2 
            <?php
            if($page == 'dashboard' && $content == 'products'){
                echo 'active';
            }
            ?>

          ">
            <a class="nav-link" href="?p=dashboard&c=products">
              <i class="fa fa-product-hunt"></i> Products
            </a>

            
          </li>

         
         
          <li class="nav-items py-2">

          <?php
          if(isset($_SESSION["is_login"]) && $_SESSION["is_login"] == true && $_SESSION["usertype"] == 1){
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
              
              <a class="btn btn-danger rounded-pill mx-2" href="javascript:void(0);" onclick="confirm('Are you sure you want to sign out?') ? window.location.href='../?p=signout' : false;">
              <span class="px-2">
              <i class='fa fa-sign-out'></i>
                Sign Out
              </span>
              </a>'
              <?php
          }
          ?>

          </li>

          


         
          
        </ul>
        <!-- <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
  </header>
    <!-- Navbar Ends -->