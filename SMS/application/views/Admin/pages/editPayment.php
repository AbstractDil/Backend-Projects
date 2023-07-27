


<?php

if(!empty($payment_data)){

    foreach($payment_data as $row){
    
        $sno =  $row['Id'];
    
        $txn_id =  $row['Transaction_Id'];
        $std_id =  $row['Student_Id'];
        $std_fname =  $row['Fname'];
        $std_lname =  $row['Lname'];
        $std_photo =  $row['photo'];
        $std_class =  $row['class'];
        $std_fees =  $row['fees'];
        $payment_status =  $row['status'];
        $payment_date =  $row['date'];
        $for_month =  $row['month'];
        $amount_paid =  $row['amount_paid'];
        $due =  $row['due'];
        $payment_method =  $row['mode'];
        $payment_comment =  $row['comment'];
    
    
       
    
    
    }
    }

      ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<h2>
<i class="fa fa-edit"></i>
    
Edit Payment Details #<?=$sno;?> </h2>





</div>

<div class="container  bg-white p-2">
    <div class="row">
        <div class="col-md-12">
        <?php

echo form_open(base_url().'admin/payment-details/edit/confirm/'.$txn_id.'/'.$std_id , array('id' => 'paymentForm'));
?>



<div class="form-row">

<div class="form-group col-md-4">
<label for="title">
<i class="fa fa-info-circle"></i>

    Payment ID</label>
<input type="text" class="form-control"  name="txn_id" value="<?=$txn_id;?>" max-length="50" min-length="3" readonly >


</div>
    
<div class="form-group col-md-4">
<label for="title">
<i class="fa fa-info-circle"></i>

    Student ID</label>
<input type="text" class="form-control"  name="std_id" value="<?=$std_id;?>" max-length="50" min-length="3" readonly >


</div>

<div class="form-group col-md-4">
<label for="title">
<i class="fa fa-user-circle"></i>

    Name of Student</label>
<input type="text" class="form-control"  name="std_name" value="<?=$std_fname;?> <?=$std_lname;?>" max-length="50" min-length="3" readonly >

</div>

<div class="form-group col-md-4">
<label for="link">
<i class="fa fa-inr"></i>

   Monthly Tuition Fees</label>
<input type="url" class="form-control" id="fees"  name="fees" readonly value="<?=$std_fees;?>" >


</div>

            
        

         


        
        

        <div class="form-group col-md-4">
    <label for="amount_paid"> <i class="fa fa-inr"></i> Amount  Paid : <span class="required">*</span> </label>
    <input type="number" class="form-control" maxlength="3" id="amount_paid" value="<?=$amount_paid;?>" name="amount_paid" required>


        </div>
       

        <div class="form-group col-md-4">
    <label for="due">Due Amount <small>(optional)</small> : </label>
    <input type="number" class="form-control" maxlength="3" id="due" name="due" value="<?=$due;?>">
        </div>


       
   
<div class="form-group  col-md-4">
  <label for="month">For Month : <span class="required">*</span></label>
  <select class="form-control" id="month" name="month" required>

  <option value="<?=$month;?>">
    <?=$month;?>
</option>

    <option value="January">January</option>
    <option value="February">February</option>
    <option value="March">March</option>
    <option value="April">April</option>
    <option value="May">May</option>
    <option value="June">June</option>
    <option value="July">July</option>
    <option value="August">August</option>
    <option value="September">September</option>
    <option value="October">October</option>
    <option value="November">November</option>
    <option value="December">December</option>
</select>


</div>
         

        <div class="form-group col-md-4">
  <label for="PaymentStatus">Payment Status : <span class="required">*</span></label>
  <select class="form-control" id="PaymentStatus" name="status" required>
  <option id="paymentStatus" value="<?= $payment_status;?>"><?= $payment_status ;?></option>

    <option value="Paid">Paid</option>
    
    <option value="Due">Due</option>

    
</select>
</div>

        
<div class="form-group col-md-4">
    
    <label for="mode">Payment Mode : <span class="required">*</span></label>
    <select class="form-control" id="mode" name="mode" required>
    
    <option value="<?=$payment_method;?>"><?=$payment_method;?></option>
    
    <option value="Offline">Offline</option>
    <option value="Online"> Online </option>
    <option value="Unpaid">Unpaid</option>
      
    
</select>
</div>





        <div class="form-group col-md-4">
    <label for="due">Comment  <small>(optional)</small> : </label>
    <input type="text" class="form-control" maxlength="150" value="<?=$payment_comment;?>" id="comment" name="comment">
        </div>

</div>



<a href="<?=base_url('admin/student')?>" class="btn btn-danger float-left">
<i class="fa fa-arrow-circle-left"></i>

Back</a>

<button type="submit" id="submitBtn" class="btn btn-success float-right"> 
<i class="fa fa-check"></i>

Continue
</button>



<?php

echo form_close();

?>

        </div>
    </div>
</div>

</main>

<script>

     



$(document).ready(function() {
    $('#paymentForm').on('submit', function() {
      $('#submitBtn').html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
      $('#submitBtn').attr('disabled', true);
    });
  });

 



  // calculate due amount

    $(document).ready(function() {
        $('#amount_paid').on('keyup', function() {
        var amount_paid = $('#amount_paid').val();
        var fees = $('#fees').val();
        var due = fees - amount_paid;
        $('#due').val(due);

        // change input box color 

        if(amount_paid == fees){
            $('#amount_paid').css('background-color', '#d4edda');
            $('#due').css('background-color', '#d4edda');
        }else{
            $('#amount_paid').css('background-color', '#f8d7da');
            $('#due').css('background-color', '#f8d7da');
        }

    // check payment status

        if(amount_paid == fees){
            $('#paymentStatus').val('Paid');
            $('#paymentStatus').html('Paid');
            // set payment mode to offline

            $('#mode').val('Offline');

            // change select box color

            $('#mode').css('background-color', '#d4eddad4');

            $('#PaymentStatus').css('background-color', '#d4edda');
            $('#comment').val('Thank You');
            $('#comment').html('Thank You');

            // change input box color

            $('#comment').css('background-color', '#d4edda');
            $('#month').css('background-color', '#d4edda');



        }else{
            $('#paymentStatus').val('Due');

            // set payment mode to not paid

            $('#mode').val('Unpaid');

            $('#paymentStatus').html('Due');
            // change select box color

            $('#PaymentStatus').css('background-color', '#f8d7da');

            // payment mode color

            $('#mode').css('background-color', '#f8d7da');

            $('#comment').val('Please pay the due amount within 15 days');
            $('#comment').html('Please pay the due amount within 15 days');

            // change input box color

            $('#comment').css('background-color', '#f8d7da');
            $('#month').css('background-color', '#f8d7da');

        }
        });
    });



     // set month automatically

     $(document).ready(function() {
        var month = new Date().getMonth() + 1;
        var year = new Date().getFullYear();
        var monthName = new Date(year, month-1, 0).toLocaleString('default', { month: 'long' });
        $('#month').val(monthName);
    });
   


document.title = "Edit <?php echo $std_fname.' '.$std_lname; ?> | <?php echo $for_month; ?>  | Payment Receipt - <?php echo $txn_id; ?> | MatHhub  ";



</script>