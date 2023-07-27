
      <!-- main content starts here -->
      
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

      <?php

if(!empty($user)){

foreach($user as $row){

$Student_Id = $row->Student_Id;





?>
        <h1 class="h3"> 
           <i class="fa fa-user"></i>  Profile :  <?php echo $row->Fname; ?>  <?php echo $row->Lname; ?>
</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>

  
     <div class="table-responsive bg-white p-2">

<table class="table table-striped table-bordered responsive">
 
<tbody>



    
    <tr>
      <td class="font-weight-bold">
       Student Name
      </td>
      <td class="text-primary">
      <img src="<?=base_url('assets/upload/images/'.$row->photo)?>" class="rounded-circle" width="35" height="35" alt="userLogo">
      <?php echo $row->Fname; ?>
      <?php echo $row->Lname; ?> 
       </td>
    </tr>

    <tr>
      <td class="font-weight-bold">
       Email
      </td>
      <td class="text-primary"> 
      <?php 
      if($row->email){
        echo $row->email;
      }
      if (!$row->email){
        echo "Not Available";
      }
       ?>
       </td>
    </tr>

    <tr>
      <td class="font-weight-bold">
       Member Id
      </td>
      <td class="text-primary">
      <?php echo $row->Student_Id; ?>
       </td>

    </tr>


    <tr>
      <td class="font-weight-bold">
     Activity
      </td>
      <td class="text-primary">
      <?php 
      if($row->activity=="1"){
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
            
       
      <?php echo $row->UserType; ?>
  

       </span>
       </td>
    </tr>

    <tr>
      <td class="font-weight-bold">
      Joined On
      </td>
      <td class="text-primary">
      <?php 
        $date = $row->Date_Time;
        $date = date('M d, Y h:m:s A', strtotime($date));
        echo $date;
       ?>
       </td>

    </tr>

    <tr>
      <td class="font-weight-bold">
     Class
      </td>
      <td>
      <?php 
       
        echo $row->class;

       ?>
       </td>
       </tr>

       <tr>
      <td class="font-weight-bold">
       Tuition Fees
      </td>
      <td class="text-primary">
        <i class="fa fa-inr"></i>
      <?php echo $row->fees; ?>
       </td>

    </tr>

         <tr>
        <td class="font-weight-bold">
        School
        </td>
        <td class="text-danger">
        <?php echo $row->school; ?>

        </td>

        </tr>

        <tr>
        <td class="font-weight-bold">
      Mobile Number
        </td>
        <td class="text-primary">
        <?php 
             
        echo $row->mob;


         ?>

        </td>
        
        </tr>


    <tr>
      <td class="font-weight-bold">
      Updated On
      </td>
      <td class="text-primary">
      <?php 
        $date = $row->update_on;
        $date = date('M d, Y h:m:s A', strtotime($date));
        echo $date;
       ?>
       </td>

    </tr>
       
  
  </tbody>
</table>

<a href="<?=base_url('admin/student');?>" type="button" class="btn btn-primary btn-sm float-left">
               <i class="fa fa-arrow-circle-left"></i> 
                Back
              </a>

            
              <a href="javascript:void();" type="button" onclick="deleteBtn()" class="btn btn-danger float-right btn-sm mx-1">
                <i class="fa fa-trash"></i>
               Delete
              </a>

              <a href="<?=base_url('admin/student/edit/'.$Student_Id);?>"  type="button" class="btn btn-success btn-sm float-right mx-1">
              <i class="fa fa-edit"></i>
                
               Edit
              </a>
              
              <?php
}
}
else{
  
  echo "
  
  <div class='float-right'>
  
  <div class='alert alert-danger' role='alert'>
  <h4 class='alert-heading'>
  <i class='fa fa-exclamation-triangle'></i>

  No Record Found! 
 
  </h4>
  <p>
   The record you are looking for is not available in our database. Either it's deleted or not available.
  </p>
  <hr>
  <p class='mb-0'>If you think, it's an issue with us. Please report us.</p>
  </div>
  
  ";
}


?>


</div>

<!-- Profile ends here  -->

<!-- Payment History Starts -->

<div class="pt-3 pb-2 mb-3 border-bottom">




<h1 class="h3"> 
           <i class="fa fa-history"></i>  Payment History :  
</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>


 <div class="table-responsive bg-white p-2 mt-3">

<table class="table table-striped table-sm  responsive" id="txnHistTable">

<thead class="bg-info text-white">
<tr>
<th>Transaction Id</th>
<th>Date</th>
<th>Month</th>
<th>Amount Paid</th>
<th>Payment Status</th>
<th>Actions</th>
</tr>
</thead>

 
<tbody>



<?php

if(!empty($payments)){

foreach($payments as $row){

$Student_Id = $row->Student_Id;

$date = $row->date;

$txn_id = $row->Transaction_Id;
$month = $row->month;
$amount_paid = $row->amount_paid;
$payment_status = $row->status;


?>

<tr>
<td>
<?php echo $txn_id; ?>
</td>
<td>
<?php echo $date; ?> 
</td>
<td>
<?php echo $month; ?>
</td>
<td>
<i class="fa fa-inr"></i>
<?php echo $amount_paid; ?>
</td>
<td>
<?php 

if($payment_status == 'Paid'){
    echo '<span class="badge badge-success"><b>Paid</b></span>';
}
else if($payment_status == 'Unpaid') {
    echo '<span class="badge badge-danger"><b>Unpaid</b></span>';
} 
else{
    echo '<span class="badge badge-danger"><b>Due</b></span>';
}

?>

</td>

<td>
<a href="<?=base_url('admin/view-receipt?std_id='.$Student_Id. '&txn_id='.$txn_id);?>"  target="_blank" class="btn btn-sm btn-primary m-1">
              <i class="fa fa-eye"></i>
            </a>
            <a href="<?=base_url('admin/payment-details/edit?std_id='.$Student_Id. '&txn_id='.$txn_id);?>" target="_blank" class="btn btn-sm btn-success m-1">
              <i class="fa fa-edit"></i>
            </a>
            <a href="javascript:void();"  onclick="deletePaymentBtn('<?=$txn_id;?>')" class="btn btn-sm btn-danger m-1">
              <i class="fa fa-trash"></i>
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

</div>
    </main>
    <!-- main content ends here -->

    <script>
      
      function deleteBtn(){

      // create sweet  alert for delete button

      swal({
          title: "Are you sure?",
          
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "<?=base_url('admin/student/delete/'.$Student_Id);?>";
          } else {
            swal("Your imaginary file is safe!");
          }
        });

      };
      </script>

      <script>
      function deletePaymentBtn(tid){

        console.log(tid);

      // create sweet  alert for delete button

      swal({
          title: "Are you sure?",
          
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "<?=base_url('admin/payment-details/delete/'.$Student_Id.'/');?>"+tid;
          } else {
            swal("Your imaginary file is safe!");
          }
        });

      }

    </script>