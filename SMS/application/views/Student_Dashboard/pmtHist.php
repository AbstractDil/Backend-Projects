
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



<section class="main">


<div class="container  py-4">

<div class="row">
    <div class="col-md-10 offset-md-1 bg-white shadow p-3">

    <div class="text-center mt-2">
            <h3>
       <i class="fa fa-history"></i>
            Payment History
        </h3>
    </div>

    <!-- Payment History -->

    <?php
    if(!empty($payment)){
        foreach ($payment as $row){
      
            $stud_id =   $row['Student_Id'];

        ?>

<?php  

if($row['status'] == 'Paid')
{
    $status = 'Paid';
    $color = 'success';
    $text = 'text-white';
}
elseif(['$status'] == 'Unpaid')
{
    $status = 'Unpaid';
    $color = 'danger';
    $text = 'text-white';
}
else
{
    $status = 'Due';
    $color = 'danger';
    $text = 'text-white';
}



?> 
   <div class="table-responsive "> 

     <a href="<?=base_url('student/payment-receipt?std_id='.$row['Student_Id'].'&txn_id='.$row['Transaction_Id']);?>"  target="_blank" class="text-decoration-none"> 
   <?php 
echo '<h3 class="badge badge-'.$color.' my-2" style="font-size:18px;">'.$row['month'] . '  ' .$status.'</h3>';


   ?>
       <table class="table table-bordered table-striped  ">
       
         <thead>
           <tr class="bg-<?php echo  $color;?> <?=$text;?>">
           <td class="bold">Student ID</td>
           <td class="bold">Payment Status</td>
           <td class="bold">Date Of Payment</td>
           <td class="bold">Transaction ID</td>

           <td class="bold">For Month</td>
           <td class="bold">Tuition Fees Per Month</td>
           <td class="bold">Amount Paid</td>
           <td class="bold">Due Amount</td>
           <td class="bold">Message</td>

           <td class="bold">Payment Mode</td>
           </tr>
           
     </thead>
     <tbody>
     <tr class="table-<?php echo $color;?>  ">
           <td><?= $row['Student_Id']; ?></td>
             <td><span class="label label-danger"><?php echo $row['status']; ?></span></td>
             <td><?= $row['date']; ?></td>
             <td><?= $row['Transaction_Id']; ?></td>
             <td><span class="label label-success"><?php echo $row['month']; ?></span></td>
             <td><?php echo $row['fees']; ?></td>
             <td><?php echo $row['amount_paid']; ?></td>
              <td><?php echo $row['due']; ?></td>
            <td><span class='label label-teal'> <?php echo $row['comment'] ?> </span> </td>

             <td><?php echo $row['mode']; ?></td>
           </tr>
            </tbody>
       </table>
       </a>   
      </div>
     
     <?php
      }
   }
else
{
   echo '<div class="alert alert-danger" style="margin-bottom:50px;">
   <strong><i class="fa fa-exclamation-circle"></i>
   No Payment History Found For Student ID:     
    '.$this->session->userdata('std_id'). '. </strong> 
 </div>';
}





?>


<div class="text-center mt-4">

<a href="<?=base_url('student/dashboard')?>" class="btn btn-primary  m-1">

<i class="fa fa-arrow-left"></i> Back

</a>
</div>

   </div>
   </div>


</div>
</section>

