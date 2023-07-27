<!DOCTYPE html>
<html lang="en">

<head>
  <title><?=$title;?> | MathHub Student Portal  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- disable google indexing for this site -->

  <meta name="robots" content="noindex, nofollow">

  <meta name="googlebot" content="noindex, nofollow">


  <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
  <!-- Home Page Css -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css?v=<?=time();?>">

  <?php
  if($title == 'Student Dashboard' || $title == 'Profile' || $title == 'Payment History'){
  ?>
  <link rel="stylesheet" href="<?=base_url();?>assets/css/dashboard-2.css?v=<?=time();?>">

<?php
  }
  ?>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/popper.min.js"></script>

<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>

<!-- Google Recaptch -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>



 

</head>

<body>

  <!-- topnav starts -->
  <section class="bg-info position-relative d-print-none">

    <div class="container text-white">


      <p class="m-0 p-1 list-inline">
        <span>
         <i class="fa fa-clock-o"></i> <span id="currentDateTime"></span>
        </span>
        <span class="float-right">
          <a href="<?=base_url('oldsite');?>" class="text-white">
          <ins>
          <i class="fa fa-external-link"></i>
          Old Site </a>

        </ins>
        </span>

      </p>

    </div>


  </section>

  <!-- topnav ends -->

  <!-- header start -->
  <header class=" pb-0 d-print-none">

    <div class="container">
      <!-- logo section starts -->
      <div class="logo d-flex mb-2">
        <a href="index.html" >
          <img src="<?=base_url();?>assets/images/logo-2.png" alt="logo">
        </a>
        <!-- <div class="logo-text p-2">
          <h1 class="mb-0">MSMS</h1>
          <p>
            MathHub Student Management System
            <br>
            Santipur, Nadia
          </p>

        </div> -->
      </div>
      <!-- logo section ends -->

      <!-- support section start  -->
      <div class="support">
        <h4><i class="fa fa-phone-square mx-1"></i>Helpline Number : +916295980525</h4>
        <h4> <i class="fa fa-envelope mx-1"></i>Support Email : hello@nandysagar.in</h4>
        <h4><i class="fa fa-envelope mx-1"></i> Educator Email : nandysagar@yahoo.com</h4>
      </div>
      <!-- support section ends -->

      <!-- right button section starts  -->

      <div class="right-menu-1">

      <?php
      if($title == 'Home'){
        ?>
        
        <a href="javascript:void()" class=" btn btn-dark glow-btn rounded-pill mob-d-none " style="text-decoration:none;" onclick="adminLoginBtn()">
          <i class="fa fa-user-circle"></i> Admin Login</a>
      
      
      <?php
      }
      ?>

    </div>
  </header>
  <!-- header ends   -->
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark  mt-0 d-print-none">
    <div class="container">
      <div class="d-flex align-items-center justify-content-between w-100">

        <div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="	fa fa-bars text-white"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

          

            <ul class="navbar-nav mr-auto">

            <?php
          if($title == 'Home' ){
          ?>

              <li class="nav-item">
                <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">User Manual</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('student/dashboard');?>">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
          <?php 

          }

          else if($title == 'Payment Receipt'){

          ?>

               <li class="nav-item">
                <a class="nav-link active" href="javascript:void();">
                <i class="fa fa-inr"></i>
                   Payment Receipt<span class="sr-only">(current)</span></a>
              </li>

          <?php 

          }


          else {


          ?>



<li class="nav-item">
  <a class="nav-link  <?php if($title == 'Student Dashboard'){echo 'active';}?>" href="<?=base_url('student/dashboard');?>"> 
    
    <i class="fa fa-dashboard"></i>
    
    Student Dashboard <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
      <a class="nav-link <?php if($title == 'Profile'){echo 'active';}?>" href="<?=base_url('student/profile')?>">
      <i class="fa fa-user"></i>
         Profile<span class="sr-only">(current)</span></a>
    </li>

                 <li class="nav-item">
                    <a class="nav-link  <?php if($title == 'Payment History'){echo 'active';}?>" href="<?=base_url('student/payment-history')?>">
                    <i class="fa fa-history"></i>
                       Payment History<span class="sr-only">(current)</span></a>
                  </li>

            </ul>

            

          <?php
          }
          ?>

          </div>
        </div>


        <!-- Show Username and Logout Button -->
        <div>

           <?php

            if($this->session->userdata('logged_in')){

        // show logout button

            ?>
            <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success  btn-sm">
            <i class="fa fa-user"></i>
            <?=$this->session->userdata('name');?>
            </button>
            
            
            <a type="button"  href="<?=base_url('student/logout');?>" class="btn  btn-danger btn-sm"> <i class="fa fa-sign-out"></i>Logout</a>
          </div>
            <!-- button section starts  -->
            <?php
            }
            else{
            ?>
         <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-success  btn-sm">
            <i class="fa fa-user"></i>
           Guest
            </button>

            <?php
            }
            ?>

        </div>
        <!-- Show Username and Logout Button -->


        
      </div>
    </div>

    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  </nav>
  <!-- navbar ends -->