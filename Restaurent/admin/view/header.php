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
        echo ' Admin Login';
    }
    elseif($page == 'login'){
        echo 'Admin Login';
    }
    elseif($page == 'Admin Dashboard'){
        echo 'Admin Dashboard';
  }
    else{
        echo '404 Page Not Found - Welcome to Mr. Deb Restaurant';
    }
    ?>
    </title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap-4.6.2/css/bootstrap.min.css">
 
    <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="../assets/bootstrap-4.6.2/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- Navbar Starts -->
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow">
      <a class="navbar-brand mx-3" href="?p=home">
        <img src="assets/images/logo-3.png" width="150" height="50" class="logo" alt="">
      
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
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
            <a class="nav-link " href="?p=dashboard">Home <span class="sr-only">(current)</span></a>
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

         
          
        </ul>
        <!-- <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
  </header>
    <!-- Navbar Ends -->