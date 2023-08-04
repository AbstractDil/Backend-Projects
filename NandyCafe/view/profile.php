<!-- Profile Page -->
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
          <h3 class="jumbotron-text display-3">
          My  Profile
          </h3>
         
        </div>
      </section>


<?php

$sql = "SELECT * FROM `user_tbl` WHERE `id` = '$_SESSION[uid]'";

  $result = mysqli_query($conn, $sql);

     while($row = mysqli_fetch_assoc($result)){

      $date = $row['datetime'];



         $uid = $row['id'];
         $name = $row['fname'];
         $email = $row['uemail'];
      

     }

?>


<div class="container  my-5">

<div class="row ">
    <div class="col-md-8 offset-md-2 bg-white shadow p-3 my-3">

    <!-- Student Profile -->

    <div class="text-center mt-2">
     
        <h3 class="text-center my-3">
            <?php echo " <i class='fa fa-user'></i> Hello " . $name;?> 
            <a href="?p=signout" title="Signout">
              <i class="fa fa-power-off"></i>
            </a>
        </h3>
    </div>

      <!-- Show Msg -->
      <div id="showMsg"></div>

    <div class="table-responsive">
        <form id="EditProfileTable">
        <input type="hidden" name="uid" value="<?php echo $uid; ?>">
        <table class="table table-striped table-bordered my-2" >

        <tbody>

        <tr>
      <td class="font-weight-bold">
       Fullame
      </td>
      <td class="text-primary">
      <input type="text" id="fname" class="form-control"  required  name="fname" pattern="[A-Za-z ]{3,}" value=" <?php echo $name; ?>">
     
       </td>

    </tr>
        <tr>
      <td class="font-weight-bold">
       Email
      </td>
      <td class="text-primary"> 
      <?php 
      if($email){
        //echo $email;
        ?>
          <input type="email" id="uemail" name="uemail" class="form-control" value="<?php echo $email;?>"  required >
        <?php
      }
      else{
        echo '<span class="text-danger">Not Available</span>';
      }
       ?>
       </td>
    </tr>

    <tr>
      <td class="font-weight-bold">
       User ID
      </td>
      <td class="text-primary">
      <?php echo $uid; ?>
       </td>

    </tr>


   

    <tr>
      <td class="font-weight-bold">
      Joined On
      </td>
      <td class="text-primary">
      <?php 
    
        echo date('d M Y',strtotime($date));

       ?>
       </td>

    </tr>

    
       
        </tbody>

        </table>

        <div class="text-center mt-4">

        <a href="?p=home" class="btn btn-secondary float-left rounded-pill px-3">
        <i class="fa fa-arrow-left"></i>
        Back
        </a>

        <a href="?p=signout" class="btn btn-warning rounded-pill"> 
        <i class="fa fa-sign-out"></i>
          Signout </a>

        <Button class="btn btn-success rounded-pill px-3 float-right" id="EditProfileBtn">
        <i class="fa fa-edit"></i>
        Edit Profile
        </Button>







        </div>
        </form>

    </div>


    </div>
</div>


</div>
    </main>
