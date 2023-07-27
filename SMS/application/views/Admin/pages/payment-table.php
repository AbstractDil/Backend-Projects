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
      <i class="fa fa-history"></i>
      Transaction History
    </h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        


      </div>


    </div>
  </div>

  <div class="table-responsive bg-white p-2">

  <table class="table table-hover table-sm responsive " id="isAnnouncementTable">
      <thead class="bg-primary text-white">
        <tr>
          <th>Sl. No. </th>
          <th>MRN</th>
          <th>Photo</th>
          <th>Name</th>

    
          <th>Class</th>
    <th scope="col">Date Of Payment</th>
      <th scope="col">For Month</th>


      <th scope="col">Transaction Id</th>
      <th scope="col">Tuition Fees</th>
      <th scope="col">Amount Received</th>
      <th scope="col">Due Amount</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Payment Mode</th>
      <th scope="col">Message</th>

      

          <th class="d-print-none">Actions</th>


        </tr>
      </thead>
      <tbody>
      <?php
    if(!empty($tuition_fees_details)){
      
      $i=0;

      foreach ($tuition_fees_details as $row) {

       

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
            echo $row['class'];
            ?>
           
          </td>
          <td>
            <?php
            $date = strtotime($row['date']);
            echo $date = date('M d,Y h:i:s A',$date);
            ?>
          </td>
          <td>

          <span class="badge badge-pink"> 

            <?php
             echo $row['month'];
            ?>

          </span>

            
            
          </td>
       <td>
            <?php
                echo $row['Transaction_Id'];
            ?>
       </td>
       
       <td>
            <?php 
           
            echo $row['fees'];
          
            ?>
          </td>

          <td>
            <?php 
           
            echo $row['amount_paid'];
          
            ?>
          </td>

          <td>
            <?php 
           
            echo $row['due'];
          
            ?>
          </td>

          <td>

            

<?php 

if ($row['status'] == 'Paid') {
  echo '<span class="badge badge-success">Paid</span>';
}else{
    echo '<span class="badge badge-danger">Due</span>';
    }

?>
</td>

          

           

            <td>
                <?php 
             
                echo $row['mode'];
            
                ?>
            </td>

            <td>
                <?php 
             
                echo $row['comment'];
            
                ?>
            </td>

          <td class="d-print-none">

   
            <a href="<?=base_url('admin/view-receipt?std_id='.$row['Student_Id']. '&txn_id='.$row['Transaction_Id']);?>"  target="_blank" class="btn btn-sm btn-primary">
              <i class="fa fa-eye"></i>
            </a>
            <a href="<?=base_url('admin/payment-details/edit?std_id='.$row['Student_Id']. '&txn_id='.$row['Transaction_Id']);?>" target="_blank" class="btn btn-sm btn-success">
              <i class="fa fa-edit"></i>
            </a>
            <a href="<?=base_url('admin/payment-details/delete/'.$row['Transaction_Id']);?>" class="btn btn-sm btn-danger" target="_blank">
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

  <div class="container text-center my-5">

    <a href="<?=base_url('admin/dashboard');?>" class="btn btn-sm btn-dark ">
      <i class="fa fa-arrow-circle-left"></i>

      Back
    </a>
    <a href="<?=base_url('admin/tuition-fees-table');?>" class="btn btn-sm btn-primary ">

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
 

  // change print title

    document.title = "Tuition Fees Details | MSMS";

</script>


