
<?php
defined('BASEPATH') OR exit('No direct script access allowed');



?>

<?php
  if ($this->session->flashdata('success')) {
    echo '<script type="text/javascript">';
    echo 'swal("Success!","'.$this -> session -> flashdata('success').'","success")';
    echo '</script>';
  }
  ?>

<?php
  if ($this->session->flashdata('error')) {
    echo '<script type="text/javascript">';
    echo 'swal("Opps!","'.$this -> session -> flashdata('error').'","error")';
   
    echo '</script>';
  }
  ?>


<div class="Login_Div">
 



      <!-- login form  start  -->
      <div class="card p-1  border-0 shadow-lg" >
        
        <div class="card-header  text-uppercase text-white text-center bg-white">
        <img src="<?=base_url();?>assets/images/logo-2.png" alt="logo">

            <h4 class="text-primary font-weight-bold mt-2"> Admin Login</h4>
        </div>
        <div class="card-body">

          <form action="<?=base_url('admin/process_login');?>" method="POST">
            <div class="form-group">
              <label for="mid"><i class="fa fa-user"></i> Username <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="mid" name="email"
               required >
             

            </div>

            <div class="form-group">
              <label for="password"><i class="fa fa-lock"></i> Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="password" name="password">
              <small id="password_check" class="form-text"></small>

            </div>
            <button type="submit" id="LoginBtn" class="btn btn-block btn-success my-1"><i class="fa fa-sign-in"></i>
              Login</button>
          </form>



        </div>
        <div class="card-footer bg-white">
        
          <a type="button" href="<?=base_url('');?>" class="btn btn-block btn-warning my-2"> <i
              class="	fa fa-mail-reply"></i> Go Home</a>

        </div>
      </div>
      <!-- login form ends  -->



</div>

<script src="assets/js/form_validation.js?v=<?=time();?>"></script>