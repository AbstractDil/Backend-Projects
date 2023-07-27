
      <!-- main content starts here -->

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
      
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 ">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

 
        <h1 class="h3 d-print-none"> 
           <i class="fa fa-eye"></i>  View Receipt: <span class="text-primary">#<?php echo $txn_id; ?> </span>  
</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          <button class="btn btn-warning btn-sm d-print-none" onclick="printDiv()">
          <i class="fa fa-print"></i>   Print Receipt
         </button>
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>

  
     <div class="table-responsive">

     <div class="container-fluid my-3">

<div class="row">
    <div class="col-md-10 offset-md-1 p-3 print-border bg-white shadow" id="printableArea">

    

        <!-- Header -->
        <div class="text-center m-2">
            <img src="<?=base_url();?>assets/images/logo-2.png" class="mb-2" alt="Logo" width="240">
            <h3 class="card-title text-danger">Guardian Copy</h3>
            <h5>Payment Receipt 

            <?php

            echo '#'. $sno;

            ?>
                
           
            </h5>
        </div>
        
        <!-- Payment status -->
        <div class="payment-status">

        <?php 


                 
                
            if($payment_status == 'Paid'){
                echo '<span class="badge badge-success"><b>'.$for_month.' - Paid</b></span>';
            }
            else if($payment_status == 'Unpaid') {
                echo '<span class="badge badge-danger"><b>'.$for_month.' - Unpaid</b></span>';
            } 
            else{
                echo '<span class="badge badge-danger"><b>'.$for_month.' - Due</b></span>';
            }
    ?>
           
        </div>
        <table class="table table-bordered " border="1">

        <tbody class="watermark">

        

        

            <tr>
                <th>Payment ID</th>
                <td>
                    <?=$txn_id;?>
                </td>
            </tr>
            <tr>
                <th>
                    <?php
                    
                    if($payment_status=='Due' || $payment_status=='Unpaid'){
                        echo 'Receipt generated on';
                    }
                    else{
                        echo 'Date of Payment';
                    }

                    ?>
                </th>
                <td>
                    <?php 

                    $date = date_create($payment_date);
                    echo date_format($date,"d/m/Y h:i:s A");
                    ?>
                </td>
            </tr>
            <tr>
                <th>Student ID</th>
                <td>
                    <?=$std_id;?>
                </td>
            </tr>
            <tr>
                <th>Student Name</th>
                <td>
                    <?=$std_fname;?> <?=$std_lname;?>
                </td>
            </tr>
            <tr>
                <th>Tuition Fees 
            
                </th>
                <td>
                    &#8377; 

                    <?=$std_fees;?>

                </td>
            </tr>
          
            <tr>
                <th>
                    Amount Paid
                </th>
                <td>
                    &#8377; 

                    <?=$amount_paid;?>

                </td>
            </tr>
            <tr>
                <th>
                    Due Amount 
                </th>
                <td>
                    &#8377; 

                    <?=$due;?>
                </td>
            </tr>

            <tr>
                <th>
                    For Month
                </th>
                <td>
                    
                    <?=$for_month;?>

                </td>
            </tr>
          
           
           
          
            <tr>
                <th>Payment Status</th>
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
            </tr>

            <tr>
                <th>Payment Method</th>
                <td>
                    <?=$payment_method;?>
                </td>
            </tr>

            <tr>
                <th>Message</th>
                <td>
                    <?=$payment_comment;?>
                </td>
            </tr>

            <tr>
                <th>
                Date of Print 
                </th>
                <td>
                    <span id="currentTime"></span>
                </td>
            </tr>

            </tbody>
        </table>
     
    
    <div class="text-muted">
        <p class="text-center">
            <strong>**Please Note:</strong>
            
            This is a computer generated receipt and does not require any signature.

        </p>
    </div>

    
    <div class=" text-center my-2 d-print-none">

    <!-- Edit and Delete Button -->

    <a href="<?=base_url();?>admin/tuition-fees-table" class="btn btn-primary btn-sm">
    <i class="fa fa-arrow-left"></i>
    Back</a>


    <a href="<?=base_url('admin/payment-details/edit?std_id='.$row['Student_Id']. '&txn_id='.$row['Transaction_Id']);?>" target="_blank" class="btn btn-sm btn-warning">
              <i class="fa fa-edit"></i> Edit
            </a>

            <?php
            if($payment_status == 'Due' || $payment_status == 'Unpaid'){
                ?>

            <a href="https://wa.me/?text=Dear <?=$std_fname;?> <?=$std_lname;?>,Your payment receipt of &#8377;<?=$amount_paid;?> for <?=$for_month;?> has been generated. Please logon to our student web portal <?=base_url();?> to view your payment details. To download payment receipt, click on the link below. <?=base_url('student/payment-receipt?std_id='.$row['Student_Id']. '&txn_id='.$row['Transaction_Id']);?>" target="_blank" class="btn btn-sm btn-success">
              <i class="fa fa-whatsapp"></i> Share 
            </a>

                <?php
            }
            else{
                ?>

                <a href="https://wa.me/?text=Dear <?=$std_fname;?> <?=$std_lname;?>,Your payment of &#8377;<?=$amount_paid;?> for <?=$for_month;?> has been received.Please logon to our student web portal <?=base_url();?> to view your payment details. To download payment receipt, click on the link below. <?=base_url('student/payment-receipt?std_id='.$row['Student_Id']. '&txn_id='.$row['Transaction_Id']);?>" target="_blank" class="btn btn-sm btn-success">
                <i class="fa fa-whatsapp"></i> Share 
              </a>
<?php

            }
            ?>

           

            <a href="<?=base_url('admin/payment-details/delete/'.$row['Transaction_Id']);?>" target="_blank" class="btn btn-sm btn-danger">
              <i class="fa fa-trash"></i> Delete
            </a>
    
            
        
    </div>

</div>
</div>
</div>


</section>

<style>

  @media print {
    .print_button {
        display: none;

    }
    .home {
        background-color: #fff;
       
    }


    .print-border {
        border: 1px solid #ccc;
    }

    .shadow {
        box-shadow: none !important;
    }
}

    table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 14px;
            color: #555;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .payment-status{
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

       


        



       
</style>

<script>

    // print function

    

function printDiv() {

    /*

var divToPrint=document.getElementById('printableArea');

var newWin=window.open('','Print-Window');

newWin.document.open();

newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

newWin.document.close();

setTimeout(function(){newWin.close();},10);

*/

window.print();


}

// show current time

const options = {
  timeZone: 'Asia/Kolkata',
  year: 'numeric',
  month: 'long',
  day: 'numeric',
  hour: 'numeric',
  minute: 'numeric',
  second: 'numeric'
};


setInterval(myTimer);

function myTimer() {
const d = new Date();
//   document.getElementById("date_time").innerHTML = d.toLocaleDateString() + d.toLocaleTimeString();

document.getElementById("currentTime").innerHTML =  d.toLocaleString('en-US', options);
}


// page title set to payment receipt

document.title = " <?php echo $std_fname.' '.$std_lname; ?> | <?php echo $for_month; ?>  | Payment Receipt - <?php echo $txn_id; ?> | MatHhub  ";

</script>

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

      }

    </script>

  

