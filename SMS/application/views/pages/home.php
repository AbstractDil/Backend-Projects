
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// flash message

if ($this->session->flashdata('success')) {
  echo '<script type="text/javascript">';
  echo 'swal("Success!","'.$this -> session -> flashdata('success').'","success")';
  echo '</script>';
}
?>

<?php
if ($this->session->flashdata('error')) {
  echo '<script type="text/javascript">';
  echo 'swal("Oops!","'.$this -> session -> flashdata('error').'","error")';
 
  echo '</script>';
}



?>



      <?php
    if(!empty($notice)){
      ?>



      
      <?php

      foreach ($notice  as $row) {

        $status = $row['status'];
       
        if($status == 3 || $status == 4 || $status == 5 || $status == 6 ){
          ?>
          <script>
           $(window).on('load',function(){
            var delayMs = 2000; // delay in milliseconds

            setTimeout(function(){
                $('#myModal').modal('show');
            }, delayMs);
        }); 
          </script>
          <?php
        }
        
      
       

        ?>

        <!-- Modal  -->

<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger font-weight-bold" id="myModalLabel">
          <i class="fa fa-exclamation-triangle blink" aria-hidden="true"></i>
          Alert 
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
      <table>
                     <tbody>

                        
      <?php

foreach ($notice  as $row) {

  $date = strtotime($row['Date_Time']);
  $date_new = date('M d,Y', $date);

  $row['Date_Time'] = $date_new;

  // check days difference

  $date = date_create($row['Date_Time']);
  $date2 = date_create(date('Y-m-d'));
  $diff = date_diff($date,$date2);
  $days = $diff->format("%a");

  

 

 
  if( $row['status'] == 3 || $row['status'] == 4 || $row['status'] == 5 || $row['status'] == 6 ){
  


  ?>

<tr>
                          <td>
                            <a href=" <?=base_url('NoticeShare/'.$row['url_slug']);?>">
                              <i class="fa fa-caret-right"></i>
                              <span class="text-primary">
                              <?=$row['Date_Time'];?>
                              </span>
                              <span class="text-secondary">
                              <?=$row['notice_title'];?>
                              <?php
                              if(  $days <= 3){
                                ?>
                                <span class="badge badge-warning blink">New</span>
                                <?php
                              }
                              ?>
                              </span>
                             
                            </a>
                          
                          </td>
                        </tr>

<?php
}
}
?>

                        </tbody>
                      </table>  
                      
                      
                      
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                      </div>
                      </div>
                      </div>
                      </div>
                      
                      <!-- Modal ends -->
                        <?php
      }
    }
  ?>





<!-- carousel start  -->

<div class="">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/images/c1.png" class="d-block w-100 h-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/images/c1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/images/c1.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

</div>


<!-- carousel ends -->



<!-- announcement start -->
<div class="bg-dark p-2 mb-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12  p-0">
        <h6 class="latestNews bg-dark text-warning">

          <!-- <span class=" latestNews text-warning"> -->
          <i class="fa fa-bullhorn blink"></i>

          <strong>
            Latest News
          </strong>

          <i class="fa fa-caret-right"></i>
          <!-- </span> -->
        </h6>


        <marquee direction="left" class="text-white">

        <?php
    if(!empty($notice )){
      
    
      foreach ($notice  as $row) {

        $date = strtotime($row['Date_Time']);
        $date_new = date('M d,Y', $date);

        $row['Date_Time'] = $date_new;

        // check days difference

        $date = date_create($row['Date_Time']);
        $date2 = date_create(date('Y-m-d'));
        $diff = date_diff($date,$date2);
        $days = $diff->format("%a");

        if( $row['status'] == 1 || $row['status'] == 5 || $row['status'] == 6 ||  $row['status'] == 8 ){

      ?>


          <strong>
            <a href=" <?=base_url('share/'.$row['url_slug']);?>"
              class="text-white px-2">
              <?php echo $row['notice_title']; ?>
            </a>
            &#8226;
          </strong>


          <?php
        }
      }
    }
    ?>
        </marquee>
      </div>
    </div>
  </div>
</div>
<!-- announcement ends -->

<!-- notices area and exam area -->
<section class="home py-4">
  <div class="container pb-3">
    <div class="row">
      <!-- Announcement section -->
      <div class="col-lg-4 my-2">
        <div class="card shadow" style="height:30em;">
          <h5 class="card-header text-white text-uppercase" style="background-color: rgb(90, 91, 47);">
            <i class="fa fa-bullhorn"></i>
            Notices
          </h5>
          <div class="card-body table-responsive">
            <table class="table table-striped table-sm">
              <tbody>

                <?php
    if(!empty($notice )){
      
    
      foreach ($notice  as $row) {

        $date = strtotime($row['Date_Time']);
        $date_new = date('M d,Y', $date);

        $row['Date_Time'] = $date_new;

        // check days difference

        $date = date_create($row['Date_Time']);
        $date2 = date_create(date('Y-m-d'));
        $diff = date_diff($date,$date2);
        $days = $diff->format("%a");

        if( $row['status'] == 2 || $row['status'] == 4 || $row['status'] == 6 ||  $row['status'] == 8 ){

      ?>


                <tr>
                  <td>
                    <a href=" <?=base_url('combined/NoticeShare/'.$row['url_slug']);?>">
                      <i class="fa fa-bullhorn"></i>
                      <span class="text-primary">
                        <?=$row['Date_Time'];?>
                      </span>
                      <span class="text-secondary">
                        <?=$row['notice_title'];?>
                        <?php
                              if(  $days <= 5){
                                ?>
                        <span class="badge badge-danger blink">New</span>
                        <?php
                              }
                              ?>
                      </span>

                    </a>

                  </td>
                </tr>

                <?php
      }
    }
  }
    else{
      ?>
                <tr>
                  <td class="text-danger h3">
                    <i class="fa fa-caret-right "></i>
                    Nothing to show
                  </td>
                </tr>
                <?php
    }
    ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
      <!-- Student Corner -->
      <div class="col-lg-4 my-2">
        <div class="card shadow" style="height:30em;">
          <h5 class="card-header  text-white text-uppercase" style="background-color: rgb(20,115, 177);">
            <i class="fa fa-graduation-cap"></i>
            Student Corner
          </h5>
          <div class="card-body table-responsive">
            <table class="table table-striped table-sm">
              <tbody>


                <?php 

                if($this->session->userdata('logged_in')){

                  ?>

                    
                    <a href="<?=base_url('student/dashboard');?>" class="text-decoration-none text-dark" target="_blank">
                    <div class=" my-2">
                      <div class="card shadow border-0">
                      <div class="card-body rounded bg-warning"><h5 class="card-title">
                         <i class="fa fa-dashboard blink-1" style="font-size:30px;"></i> 
                         Go To Dashboard</h5></div></div></div>
                    </a>
                 

                  <?php

                }
                else{
                  ?>

             <form id="LoginForm" action="<?=base_url('student/process_login');?>" method="POST">
              
                  <div class="form-group">
                    <label for="std" class="col-form-label ">
                      <i class="fa fa-user"></i>
                      Enter Student ID: 
               <span class="text-danger">*</span>

                    </label>
                      <div class="input-group ">
                      <div class="input-group-prepend">
                      <div class="input-group-text">
                      <i class="fa fa-user"></i>

                      </div>
                    </div>
                                  
                    <input type="text" placeholder="Enter Student ID" name="std_id" class="form-control " id="std_id">
                  </div>
                  <small id="std_id_check" class="form-text"></small>
                </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label ">
                      <i class="fa fa-key"></i>
                      Enter Password:
               <span class="text-danger">*</span>

                    </label>
                      <div class="input-group ">
                      <div class="input-group-prepend">
                      <div class="input-group-text">
                      <i class="fa fa-lock"></i>
                      </div>
                      </div>
                    <input type="password" placeholder="Enter Password" name="pwd" class="form-control input-lg" id="password">
                  </div>
                  <small id="password_check" class="form-text"></small>
                  </div>

                  <!-- <div class="form-group ">
              <label for="googleCaptcha"><i class="fa fa-check-circle"></i> 
              Please verify you are human <span
                  class="text-danger">*</span>
             </label>
            <div class="g-recaptcha" id="googleCaptcha"  data-sitekey="6Lf4MakiAAAAADdimepOuaVNKOqQXEohoK3NwdCo"></div>
           
            </div> -->

            <div class="form-group ">
                  <button type="submit" class="btn btn-success btn-block" id="LoginBtn">
                    <i class="fa fa-sign-in"></i>
                   Proceed to Login</button>
               </div>
              </form>

              <button type="button" class="btn btn-danger btn-block mt-2" id="FrgtPwdBtn" onclick="swal('Please contact with your teacher.','','');">
                    <i class="fa fa-key"></i>
                   Forget Password</button>

               <?php
                }
                ?>

               

              </tbody>

            </table>

          </div>
        </div>
      </div>


      <!-- educator corner  -->
      <div class="col-lg-4 my-2">
        <div class="card shadow" style="height:30em;">
          <h5 class="card-header  text-white text-uppercase" style="background-color: rgb(114, 06, 47);">
            <i class="fa fa-user"></i>
            Educator Profile
          </h5>
          <div class="card-body table-responsive margin-left-2">
            <table class="table table-striped table-sm">
              <tbody>
               

              <!--  Profile Card -->
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <div class="text-center">
                    <img src="<?=base_url('assets/upload/images/IMAGE.jpg');?>" class="rounded-circle border" width="110" height="110" alt="Sagar Nandy">
                  </div>
                  <h5 class="card-title text-center text-uppercase my-2">Sagar Nandy</h5>
                  <h6 class="card-subtitle text-center mb-2">
                    <span class="badge badge-primary">Educator</span>
                    <span class="badge badge-success">Admin</span>

                  </h6>
                  <p class="card-text  text-center">
                   <strong>
                    Qualification: B.Sc (Hons) in Mathematics
                   </strong>
                  </p>
                  <div class="text-center">

                  <a href="https://www.nandysagar.in" class="btn btn-warning btn-sm ">
                   <i class="fa fa-external-link"></i>  Know More
                  </a>

                  </div>
                  
                </div>
              </div>
              <!-- Profile Card End -->

              </tbody>

            </table>

          </div>
        </div>
      </div>







    </div>
  </div>

</section>

<script src="assets/js/form_validation.js?v=<?=time();?>"></script>

<script>

  $(document).ready(function() {
    $('#LoginForm').on('submit', function() {
      $('#LoginBtn').html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
      $('#LoginBtn').attr('disabled', true);
    });
  });
 
</script>