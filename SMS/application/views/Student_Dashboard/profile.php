
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


if(!empty($profile)){
    foreach ($profile as $row){
      $std_id =   $row['Student_Id'];
        $fname =   $row['Fname'];
        $lname =   $row['Lname'];
        $email =   $row['email'];
        $mob =   $row['mob'];
        $class =   $row['class'];
        $school =   $row['school'];
        $fees =   $row['fees'];
        $last_login =   $row['last_login'];
        $std_img =   $row['photo'];
        $update_on =   $row['update_on'];
        $joined_on =   $row['Date_Time'];
        $UserType =   $row['UserType'];
        $date = date_create($joined_on);
        $joined_on = date_format($date, 'M d,Y h:m:s A');
        $activity =   $row['activity'];

    } 
}

?>

<?php



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



<section class="main">


<div class="container  py-4">

<div class="row">
    <div class="col-md-8 offset-md-2 bg-white shadow p-3">

    <!-- Student Profile -->

    <div class="text-center mt-2">
        <img src="<?=base_url('assets/upload/images/'.$row['photo'])?>" alt="<?=$fname;?>" class="rounded-circle mx-2 border" width="95" height="95">
        <h3 class="text-center my-3">
            <?=$fname;?> <?=$lname;?>
        </h3>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered my-2">

        <tbody>
        <tr>
      <td class="font-weight-bold">
       Email
      </td>
      <td class="text-primary"> 
      <?php 
      if($email){
        echo $email;
      }
      else{
        echo '<span class="text-danger">Not Available</span>';
      }
       ?>
       </td>
    </tr>

    <tr>
      <td class="font-weight-bold">
       Student ID
      </td>
      <td class="text-primary">
      <?php echo $std_id; ?>
       </td>

    </tr>


    <tr>
      <td class="font-weight-bold">
     Activity
      </td>
      <td class="text-primary">
      <?php 
      if($activity=="1"){
        echo '<span class="badge badge-success blink">Online</span>';
      }else{
        echo '<span class="badge badge-danger">Offline</span>';
      }
       ?>
       </td>

    </tr>

   

    <tr>
      <td class="font-weight-bold">
      Role
      </td>
      <td>
        <span class="badge badge-warning">
            
       
      <?php echo $UserType; ?>
  

       </span>
       </td>
    </tr>

    <tr>
      <td class="font-weight-bold">
      Joined On
      </td>
      <td class="text-primary">
      <?php 
    
        echo $joined_on;
       ?>
       </td>

    </tr>

    <tr>
      <td class="font-weight-bold">
     Class
      </td>
      <td>
      <?php 
       
        echo $class;

       ?>
       </td>
       </tr>

       <tr>
      <td class="font-weight-bold">
       Tuition Fees
      </td>
      <td class="text-primary">
        <i class="fa fa-inr"></i>
      <?php echo $fees; ?>
       </td>

    </tr>

         <tr>
        <td class="font-weight-bold">
        School
        </td>
        <td class="text-danger">
        <?php echo $school; ?>

        </td>

        </tr>

        <tr>
        <td class="font-weight-bold">
      Mobile Number
        </td>
        <td class="text-primary">
        <?php 
             
        echo $mob;


         ?>

        </td>
        
        </tr>


    <tr>
      <td class="font-weight-bold">
      Updated On
      </td>
      <td class="text-primary">
      <?php 
        $date = $update_on;
        $date = date('M d, Y h:m:s A', strtotime($date));
        echo $date;
       ?>
       </td>

    </tr>

    <tr>
      <td class="font-weight-bold">
     Last Login
      </td>
      <td class="text-primary">
      <?php 
        $date = $last_login;
        $date = date('M d, Y h:m:s A', strtotime($date));
        echo $date;
       ?>
       </td>

    </tr>
       
        </tbody>

        </table>

        <div class="text-center mt-4">

        <a href="<?=base_url('student/dashboard')?>" class="btn btn-primary  m-1">

        <i class="fa fa-arrow-left"></i> Back
    
       </a>

       <a href="<?=base_url('student/change-password')?>" class="btn btn-danger  m-1">

        <i class="fa fa-lock"></i> Change Password
       </a>

       <a href="<?=base_url('student/change-password')?>" class="btn btn-success m-1">

        <i class="fa fa-edit"></i> Edit Profile
       </a>



        </div>

    </div>


    </div>
</div>


</div>
</section>

