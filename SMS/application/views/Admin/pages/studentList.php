<!-- main content starts here -->

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <!-- flash message  -->
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
  <!-- flash message ends here -->
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>
      <i class="fa fa-users"></i>
      List of Students
    </h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#staticBackdrop">
          <i class="fa fa-plus-circle"></i>
          Add new student</button>
        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog   modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">
                  <i class="fa fa-user-plus"></i>

                  New Student
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form action="<?=base_url('admin/student/create');?>" method="post" accept-charset="utf-8" id="regForm">

                  <div class="form-group">

                    <div class="form-group col-md-12"><label for="Fname"> <i class="fa fa-user"></i>
                        Firstname</label>
                        <input type="text" name="Fname" class="form-control" id="Fname" pattern = "[A-Za-z]{1,32}" title = "Only Alphabets are allowed." required>
              
                    </div>
                    <div class="form-group col-md-12"><label for="Lname"><i class="fa fa-user"></i>
                        Lastname</label><input type="text" name="Lname"  class="form-control" id="Lname"
                        pattern = "[A-Za-z]{1,32}" title = "Only Alphabets are allowed." required>
                    </div>
                    <div class="form-group col-md-12"><label for="email">
                        <i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
                    </div>



                    <div class="form-group  col-md-12">
                      <label for="mob"> <i class="fa fa-phone"></i> Contact Number:</label>
                      <input type="number" class="form-control" id="mob" name="mob" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Please enter a valid mobile number." required>


                    </div>
                    <div class="form-group  col-md-12">
                      <label for="class"><i class="fa fa-graduation-cap"></i> Present Class:</label>
                      <input type="number" class="form-control" id="class" name="class" maxlength="2" pattern="[0-9]{2}" title="Please enter a valid class." required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="school"> <i class="fa fa-bank"></i> School :</label>
                      <input type="text" minlength="3" class="form-control" id="school" name="school" pattern = "[A-Za-z]{1,32}" title = "Only Alphabets are allowed." required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="fees"> <i class="fa fa-inr"></i> Tuition Fees:</label>
                      <input type="text" class="form-control" name="fees" id="fees" pattern="[0-9]{1,5}" title="Please enter a valid fees." required>
                    </div>


                    <!-- ===================================================
                      Password is automatically generated after submit the form. 
                    =======================================================-->

                    <!-- <div class="form-group col-md-12">
                      <label for="pwd"><i class="fa fa-lock"></i> Create Password:</label>
                      <input type="password" class="form-control" name="pwd" id="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>


                    </div> -->


                  </div>





              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">
                  <i class="fa fa-close"></i>
                  Close</button>

                  <button type="submit" class="btn btn-success" id="regBtn"> 
                  <i class="fa fa-user-plus"></i>
                  Add
                </button>


              </div>




              </form>












            </div>
          </div>
        </div>


      </div>


    </div>
  </div>

  <div class="table-responsive bg-white p-2">

  <table class="table table-hover table-sm responsive" id="isAnnouncementTable">
      <thead class="bg-primary text-white">
        <tr>
          <th>Sl. No. </th>
          <th>MRN</th>
          <th>Photo</th>
          <th>Name</th>
       <th>Activity</th>
         
          <th>Email</th>
    
          <th>Class</th>
         <th>Role</th>
          <th>Mob no</th>
          <th>Created On</th>

          
          <th>Actions</th>


        </tr>
      </thead>
      <tbody>
      <?php
    if(!empty($user)){
      
      $i=0;

      foreach ($user as $row) {

       

        $i++;
        
      

        ?>
        <tr>
          <td>
            <?=$i;?>
          </td>

          <td>
            <?=$row['Student_Id'];?>
          </td>

          <td>
          <img src="<?=base_url('assets/upload/images/'.$row['photo'])?>" class="rounded-circle mx-2 border" width="35" height="35" alt="userLogo">
          </td>
         
          <td>
         
          

            <?=$row['Fname'];?> <?=$row['Lname'];?>

          </td>
          <td>
            <?php
            if($row['activity']=="1"){
              echo '<span class="badge badge-success blink">Online</span>';
            }else{
              echo '<span class="badge badge-danger">Offline</span>';
            }
            ?>
          </td>
          <td>
           <?php
           if($row['email']!=""){
            echo $row['email'];
            }else{
              echo '<span class="text-danger">Not Available</span>';
            }
           ?>
          </td>
          <td>
            <?php
            echo $row['class'];
            ?>
          </td>
          <td>

            <?php
            if($row['UserType']=="Student"){
              echo '<span class="badge badge-success ">Student</span>';
            }else{
              echo '<span class="badge badge-danger">Admin</span>';
            }
            ?>
            
          </td>
       <td>
            <?php
            echo $row['mob'];
            ?>
       </td>
       
       <td>
            <?php 
            $date = strtotime($row['Date_Time']);
            echo $date = date('M d,Y h:i:s A',$date);
          
            ?>
          </td>

          <td>

          <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-cog"></i>
     Options
     
  </button>
  <div class="dropdown-menu text-secondary">
    
    <a href="<?=base_url();?>admin/student/view/<?=$row['Student_Id'];?>" class="dropdown-item ">
        <i class="fa fa-eye"></i>
        View 
      </a>
    
    
    
      <a href="<?=base_url();?>admin/student/edit/<?=$row['Student_Id'];?>" class="dropdown-item">
        <i class="fa fa-edit"></i>
        Edit 
      </a>

      <a href="<?=base_url();?>admin/student/make-payment/<?=$row['Student_Id'];?>" class="dropdown-item">
        <i class="fa fa-inr"></i>
        Make Payment
      </a>

      <a href="<?=base_url();?>admin/student/delete/<?=$row['Student_Id'];?>" class="dropdown-item">
        <i class="fa fa-trash"></i>
        Delete
      </a>

  </div>
</div>


           

          



          </td>

        </tr>



        <?php
      }
      
    }
    ?>
        

      </tbody>
    </table>

  </div>

  <div class="container text-center my-5">

    <a href="<?=base_url('admin/dashboard');?>" class="btn btn-sm btn-dark ">
      <i class="fa fa-arrow-circle-left"></i>

      Back
    </a>
    <a href="<?=base_url('admin/tuition-fees');?>" class="btn btn-sm btn-primary ">

      Next
      <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>



</main>
<!-- main content ends here -->

<script src="<?php echo base_url();?>assets/js/form_validation.js"></script>
<script>

  $(document).ready(function() {
    $('#regForm').on('submit', function() {
      $('#regBtn').html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
      $('#regBtn').attr('disabled', true);
    });
  });
 
</script>


