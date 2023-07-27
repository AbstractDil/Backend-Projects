<!doctype html>
<html lang="en">
  <head>
  

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- disable google indexing for this site -->

  <meta name="robots" content="noindex, nofollow">

<meta name="googlebot" content="noindex, nofollow">

    <title><?php echo $title ." | MSMS" ; ?></title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- custom style -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dashboard.css?version=<?=time();?>">

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>





<!-- Datatable  -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>DataTables/datatables.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>DataTables/Responsive-2.4.0/css/responsive.bootstrap4.min.css">










    <!-- Favicons -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
 



<script>
window.onload = function() {
  // document.getElementById('preLoader').style.transition = "all 2s ease-in-out";
  //document.getElementById('preLoader').style.opacity = "0";
  //document.getElementById('preLoader').style.visibility = "hidden";
  document.getElementById('preLoader').style.display = "none";
}
</script>
    
  
  </head>
  <body>

  <!-- preloader start -->

<div id="preLoader">
   <!-- <div id="Loader">&nbsp;</div> -->
  

  <!-- <div class="spinner-grow  spinner-grow-sm  text-success mx-1" role="status"></div> -->
  <div class="spinner-grow spinner-grow-sm  text-primary mx-1" role="status"></div>
<div class="spinner-grow  spinner-grow-sm text-danger mx-1" role="status"></div>
<div class="spinner-grow spinner-grow-sm  text-warning mx-1" role="status"></div>

   
 
</div>

<!-- preloader ends -->

<?php
if($title != 'Admin Login' || $title != 'Payment Receipt'){
?>

  <nav class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0 shadow d-print-none">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3  font-weight-bold" href="#">
    <img src="<?=base_url('assets/images/logo.png');?>" width="35" height="35" class="mb-1" alt="">

    

    <span class="h5">MSMS</span> <br>
    <!-- <span class="badge badge-danger">Admin</span> -->

  </a>
  <button class="navbar-toggler text-white position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
    data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-white"></span>
  </button>

  <ul class="navbar-nav px-3">

    <li class="nav-item ">
      <a class="text-white nav-link" href="<?=base_url('admin/logout');?>">
        <i class="fa fa-sign-out"></i>
        Logout</a>
    </li>
  </ul>
</nav>
<!-- topnav ends here -->

<?php
}
?>

        <?php
        if($title != 'Admin Login'){
        ?>
<!-- container-fluid starts here -->
<div class="container-fluid ">
  <!-- row starts here -->
  <div class="row">
    <!-- sidebar starts here -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark  sidebar collapse d-print-none">
      <!-- sidebar sticky div start here -->
      <div class="sidebar-sticky pt-3">
        <!-- section one start -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Student Management</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column ">
          <li class="nav-item">
            <a class="nav-link text-white <?php if ($title=='Admin Dashboard'){echo 'active';}?>" href="<?=base_url('admin/dashboard');?>">
              <i class="fa fa-dashboard"></i>
              Dashboard 
            </a>
          </li>
          


          <li class="nav-item">
            <a class="nav-link  <?php if ($title=='Notices' || $title=='Edit Notice'){echo 'active';}?>" href="<?=base_url('admin/notice');?>">
              <i class="fa fa-plus-circle"></i>
               Notice & Slider
            </a>
          </li>

          

          <!-- Study Materials -->

          <li class="nav-item">
            <a class="nav-link <?php if ($title=='Study Materials'){echo 'active';}?> ?>" href="<?=base_url('admin/study-materials');?>">
              <i class="fa fa-graduation-cap"></i>
              Study Materials
            </a>
          </li>


         

          <!-- User Management -->

          <?php
          // if($this->session->userdata('role') == 4){
          ?>

          <li class="nav-item">
            <a class="nav-link <?php if ($title=='List of Students'){echo 'active';}?>" href="<?=base_url('admin/student');?>">
              <i class="fa fa-users"></i>
              Student Management
            </a>
            </li>

          <?php
         //}
          ?>

           <!--Payments-->

           <li class="nav-item">
            <a class="nav-link <?php if ($title=='Tuition Fees Table'){echo 'active';}?> ?>" href="<?=base_url('admin/tuition-fees-table/');?>">
              <i class="fa fa-paypal"></i>
              Tuition Fees
            </a>
          </li>

           <!-- Site Settings-->

           <li class="nav-item">
            <a class="nav-link <?php if ($title=='Site Settings'){echo 'active';}?> ?>" href="<?=base_url('Admin_Dashboard/site-settings');?>">
              <i class="fa fa-gear"></i>
              Site Settings
            </a>
          </li>

        </ul>
        
        <!-- section one ends -->

        <!-- section two starts -->



        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>
          Logged in as
          </span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2 ">
          <li class="nav-item">
            <a class="nav-link bg-success text-white" href="<?=base_url('profile-settings');?>">

          

            <i class="fa fa-user"></i>
           <?php

             echo $this->session->userdata('name');
              echo " ";
             echo $this->session->userdata('lname');



              ?>

            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link bg-warning" href="#">

            <i class="fa fa-calendar"></i>
              
            <!-- current date time -->

            <?php

                $date = date('M d,Y');
                echo $date;

            ?>
            
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link bg-danger text-white" href="<?=base_url('Admin_Logout');?>">

            <i class="fa fa-sign-out"></i>
              
            <!-- current date time -->

        Logout
            
            </a>
          </li>
        </ul> 
        <!--  section two ends -->
      </div>
      <!-- sidebar sticky div ends here -->

    </nav>

        <?php
        }
        ?>
    <!-- sidebar ends here -->


  