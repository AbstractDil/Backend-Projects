

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<?php

if(!empty($user)){
    foreach ($user as $row) {
        $Student_Id = $row->Student_Id;
        $fname = $row->Fname;
        $lname = $row->Lname;
        $email = $row->email;
        $mob = $row->mob;
        $fees = $row->fees;

        $class = $row->class;
        $school = $row->school;
        
        

        
    }
}

?>
<h2>
<i class="fa fa-users"></i>    
Edit <?=$fname;?> Details </h2>





</div>

<div class="container  bg-white p-2">
    <div class="row">
        <div class="col-md-12">
        <?php

echo form_open(base_url().'admin/student/edit/confirm/'.$Student_Id , array('id' => 'editForm'));
?>



<div class="form-row">


<div class="form-group col-md-6">
<label for="name">
    <i class="fa fa-user"></i>
   Student Id
</label>
<input type="text" class="form-control" id="Fname" name="Fname" value="<?=$Student_Id;?>" disabled>


</div>

<div class="form-group col-md-6">
<label for="name">
    <i class="fa fa-user"></i>
   Firstname
</label>
<input type="text" class="form-control" id="Fname" name="Fname" value="<?=$fname;?>" max-length="50" min-length="3" pattern="[a-zA-Z0-9\s]+">


</div>

<div class="form-group col-md-6">
<label for="name">
    <i class="fa fa-user"></i>
   Lastname
</label>
<input type="text" class="form-control" id="Lname" name="Lname" value="<?=$lname;?>" max-length="50" min-length="3" pattern="[a-zA-Z0-9\s]+">


</div>

<div class="form-group col-md-6">
<label for="email">
    <i class="fa fa-envelope"></i>
     Email
</label>
<input type="email" class="form-control" id="email" name="email" value="<?=$email;?>" >


</div>

<div class="form-group col-md-6">
<label for="role">
<i class="fa fa-phone"></i>

    Mobile Number
</label>

<input type="number" class="form-control" id="mob" name="mob" value="<?=$mob;?>" max-length="10" min-length="10" pattern="[0-9]+">
</div>  


<div class="form-group col-md-6">
<label for="role">
<i class="fa fa-graduation-cap"></i>

   Class
</label>

<input type="number" class="form-control" id="class" name="class" value="<?=$class;?>" max-length="2" min-length="1" pattern="[0-9]+">
</div> 

<div class="form-group col-md-6">
<label for="role">
<i class="fa fa-graduation-cap"></i>
Tuition Fees
</label>

<input type="number" class="form-control" id="fees" name="fees" value="<?=$fees;?>" max-length="4" min-length="3" pattern="[0-9]+">
</div> 

<div class="form-group col-md-6">
<label for="school">
    <i class="fa fa-bank"></i>
   School
</label>
<input type="text" class="form-control" id="school" name="school" value="<?=$school;?>" max-length="150" min-length="3" pattern="[a-zA-Z0-9\s]+">


</div> 

<div class="form-group col-md-6">
<label for="password">
    <i class="fa fa-key"></i>
  Change Password
</label>
<input type="password" class="form-control" placeholder="Enter New Passoword" name="password" min-length="8" required >

</div>
</div>

<a href="<?=base_url('Admin_Dashboard/User_Management ')?>" class="btn btn-danger float-left">
<i class="fa fa-arrow-circle-left"></i>

Back</a>

<button type="submit" name="submit"  class="btn btn-success float-right" id="editBtn">
<i class="fa fa-save"></i>
Save Changes</button>

<? form_close(); ?>
        </div>
    </div>
</div>




</main>


<script>

$(document).ready(function() {
    $('#editForm').on('submit', function() {
      $('#editBtn').html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
      $('#editBtn').attr('disabled', true);
    });
  });



</script>