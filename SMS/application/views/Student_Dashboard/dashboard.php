
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
    if(!empty($payment)){
      ?>



      
      <?php

      foreach ($payment  as $row) {

        $status = $row['status'];
       
        if($status == "Due" || $status == "Unpaid"){
          ?>
          <script>
           $(window).on('load',function(){
            var delayMs = 1000; // delay in milliseconds

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
      <div class="modal-header bg-danger">
        <h6 class="modal-title text-white font-weight-bold" id="myModalLabel">
          <i class="fa fa-exclamation-triangle blink" aria-hidden="true"></i>
          Message from Admin
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
      <table>
                     <tbody>

                        
      <?php

foreach ($payment as $row) {

  $date = strtotime($row['date']);
  $date_new = date('M d,Y', $date);

  $row['date'] = $date_new;

 if( $row['status'] == "Due"|| $row['status'] == "Unpaid" ){
  

  ?>

<tr>
                          <td>
                          <a href="<?=base_url('student/payment-receipt?std_id='.$row['Student_Id'].'&txn_id='.$row['Transaction_Id']);?>"  target="_blank" class="text-decoration-none"> 
                              <i class="fa fa-caret-right"></i>
                              <span class="text-primary">
                              <?=$row['date'];?>
                              </span>
                              <span class="text-secondary">
                                Dear <?=$this->session->userdata('name');?>, Your payment of <i class="fa fa-inr"></i><?=$row['due'];?> for <?=$row['month'];?> is <?=$row['status'];?>,
                              <?=$row['comment'];?>.
                              <span class="badge badge-warning blink">New</span>
                              
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



<section class="main">


<div class="container  py-3">

<!-- Show Alert Start -->

<!-- 
 This alert is created by admin.
 -->

<div class="alert shadow bg-warning mt-3 text-dark" role="alert">



          <div class="latestNews bg-warning text-dark">

          <strong>  <i class="fa fa-warning blink"></i> Alert :</strong>


            <i class="fa fa-caret-right"></i>
            <!-- </span> -->
          </div>


          <marquee direction="left" class="text-dark pt-1">


          <?php
    if(!empty($payment)){
    
      foreach ($payment  as $row) {

        $status = $row['status'];
       
        if($status == "Due" || $status == "Unpaid"){
          ?>

    <a href="<?=base_url('student/payment-receipt?std_id='.$row['Student_Id'].'&txn_id='.$row['Transaction_Id']);?>"  target="_blank" class="text-decoration-none text-dark"> 
                                  
                                  
                                  <span class="text-dark">
                                    Dear <?=$this->session->userdata('name');?> , Your payment of <i class="fa fa-inr"></i><?=$row['due'];?> for <?=$row['month'];?> is <?=$row['status'];?>,
                                  <?=$row['comment'];?>.
                                
                                  
                                  </span>
                                
                                </a>

          <?php
        }
      }
    }
    else{
      echo "<strong>Welcome to MathHub Student Portal.</strong>";
    }
          ?>
          </marquee>
        
  

<!-- <strong class="h6">  <i class="fa fa-warning blink"></i> Alert :</strong> -->

  <!-- A simple warning alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like. -->
</div>



  
<!-- Show Alert Ends -->


<!-- Show Content Options Start -->

<div class="row py-3" id="myContent">
</div>

<!-- Show Content Options Ends-->




<!-- Instruction Section -->

<div class="row">

<!-- Notice start -->

<div class="col-md-4">
  <div class="card shadow my-3" style="height:25em;">
    <h5 class="card-header bg-dark-yellow text-white">
      <i class="fa fa-bullhorn"></i>
      Notices</h5>
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
  <!-- Notice ends -->


  <!-- e-Statement start -->

<div class="col-md-4">
  <div class="card shadow my-3" style="height:25em;">
    <h5 class="card-header bg-dark-blue text-white">
      <i class="fa fa-paypal"></i>
     Payment Receipt</h5>
    <div class="card-body table-responsive">
    <table class="table table-striped table-sm">
                <tbody>
                 
                <?php
    if(!empty($payment)){
        foreach ($payment as $row){
      
            

        ?>

                <tr>



                <td>
                <a href="<?=base_url('student/payment-receipt?std_id='.$row['Student_Id'].'&txn_id='.$row['Transaction_Id']);?>"  target="_blank" class="text-decoration-none"> 
                    <i class="fa fa-calendar"></i>
                    <?php
                    
                    $date = $row['date'];

                    $date = date('M d, Y', strtotime($date));

                    echo $date;


                     
                     ?>


                 <span class="text-muted">

                  <?php
                    echo $row['month'] . " Receipt ";

                   if ($row['status'] == "Paid") {
                    echo "<span class='badge badge-success'>Paid</span>";
                   }
                   elseif($row['status'] == "Unpaid"){
                    echo "<span class='badge badge-danger blink'>Unpaid</span>";
                  }
                    else{
                      echo "<span class='badge badge-danger blink'>Due</span>";
                    }


                    ?>
                    </span>
                  </a>


                 

                </td>



                </tr>
               
                <?php
        }
    }
    else
    {
       echo '<div class="alert alert-danger" style="margin-bottom:50px;">
       <strong><i class="fa fa-exclamation-circle"></i> 
       No Payment Receipt Found for Student ID :   
        '.$this->session->userdata('std_id'). '. </strong> 
     </div>';
    }
    
    ?>
            
                 
                </tbody>



              </table>
    </div>
    <div class="card-footer ">
    <a href="<?=base_url('student/payment-history');?>" class="float-right">
      <i class="fa fa-eye"></i>
      View All</a>
  </div>
  </div>
</div>
  <!-- e-Statement ends -->

</div>
<!-- Instruction Section Ends -->
  


</div>
</section>

<script>
      var myContent = document.getElementById('myContent');

      var myData = [
        {
          "title": " <i class='fa fa-home blink-1' style='font-size:30px;'></i> Go Home",
          "link": "<?php echo base_url(); ?>",
        
          
        },
        {
          "title": " <i class='fa fa-user-circle blink-1' style='font-size:30px;'></i> Student Profile",
          "link": "<?=base_url('student/profile');?>",
          

        },
        {
           "title": " <i class='fa fa-book blink-1 '  style='font-size:30px;'></i> Study Material",
          "link": "<?=base_url('student/study_materials');?>",
          "number": "<?php echo "12" ; ?>",
        },
        {
          "title": " <i class='fa fa-inr blink-1 '  style='font-size:30px;'></i> Payment History",
          "link": "<?=base_url('student/payment-history');?>",

          "number": "13",

        },
       
       
       
      ];

      var cardColor = ['bg-primary', 'bg-success','bg-info', 'bg-danger',   'bg-dark', 'bg-dark-yellow', 'bg-dark-green', 'bg-dark-blue','bg-danger','bg-secondary','bg-dark-yellow','bg-success'];

      // generate color  automatically from this array




           



      var myHTML = '';

      for (var i = 0; i < myData.length; i++) {
        myHTML += '<div class="col-md-3 my-2">';
        myHTML += '<div class="card shadow border-0" >';
        myHTML += '<div class="card-body rounded text-white  ' + cardColor[i] + '" >';
        myHTML += '<h5 class="card-title">' + myData[i].title + '</h5>';
        // divider line
        myHTML += '<hr class="bg-white my-0">';
     
        myHTML += '<a href="' + myData[i].link + '"  target="_blank" class="btn btn-outline-light mt-2 btn-sm ">Go <i class="fa fa-external-link"></i></a>';


        myHTML += '</div>';
        myHTML += '</div>';
        myHTML += '</div>';
      }

      myContent.innerHTML = myHTML;



    </script>