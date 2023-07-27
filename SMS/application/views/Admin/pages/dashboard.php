<!-- main content starts here -->
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
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
      <?php
          if($this->session->userdata('role') == "Admin"){
            echo 'Admin';

          }
          
          ?>

      Panel
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="<?=base_url('admin/student/view/'.$this->session->userdata('std_id'));?>" class="btn btn-sm btn-success">

          Welcome, <?=$this->session->userdata('name');?>
           <?=$this->session->userdata('lname');?> 

        </a>

      </div>
      <a href="<?=base_url('admin/logout')?>" class="btn btn-sm btn-outline-danger ">
        <i class="fa fa-sign-out"></i>
        Logout
      </a>
    </div>
  </div>


  <div class="container table-responsive ">

    <!-- Generate card using javascript -->
    <div class="row" id="myContent"></div>


    <div class="row my-3">
      <div class="col-md-4 my-2">
        <div class="card shadow border-0" style="height:25em;">
          <div class="card-header bg-primary">
            <h5 class="card-title text-white">
              <i class="fa fa-bell"></i>
             Notice
            </h5>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped">

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

        

        /*
        $update_on = $row['updated_on'];

        if($update_on == ''){
          $row['updated_on'] = 'Not Updated Yet';
        }
        else{
          $row['updated_on'] = $row['updated_on'];
        }
        */

       
        
      

        ?>

                <tr>
                  <td>
                    <a href="<?=base_url('admin/notice/edit/'.$row['sno']);?>">
                      <i class="fa fa-caret-right"></i>
                      <span class="text-primary">
                        <?=$row['Date_Time'];?>
                      </span>
                      <span class="text-secondary">
                        <?=$row['notice_title'];?>
                        <?php
                              if($days <= 7){
                                ?>
                        <span class="badge badge-danger blink">New</span>
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
    else{
      ?>
                <tr>
                  <td class="text-danger h3">
                    <i class="fa fa-caret-right "></i>
                    No Notice Found
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




      <div class="col-md-4 my-2">
        <div class="card shadow border-0" style="height:25em;">
          <div class="card-header bg-dark-green">
            <h5 class="card-title text-white">
              <i class="fa fa-users"></i>
              Online Users
            </h5>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-striped">

              <tbody>
                <?php
              if(!empty($user)){
                foreach($user as $row){
                  if($row['activity'] == 1){
                    
            
                  ?>
                <tr>
                  <td>
                    <a href="<?=base_url('admin/student/view/'.$row['Student_Id']);?>">
                      <i class="fa fa-caret-right"></i>
                      <span class="text-primary">
                        <?=$row['Fname'];?>
                        <?=$row['Lname'];?>

                      </span>
                      <span class="text-secondary">
                        <?php
                        if($row['activity'] == 1){
                          ?>
                        <span class="badge badge-success blink-1">Online</span>
                        <?php
                        }
                        else{
                          ?>
                        <span class="badge badge-danger">Offline</span>
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
              ?>


              </tbody>
            </table>



          </div>
        </div>

      </div>




     

      

    </div>
    <!-- container ends -->



</main>
<!-- main content ends here -->


<script>
  var myContent = document.getElementById('myContent');

  var myData = [
    {
      "title": " <i class='fa fa-home blink-1' style='font-size:25px;'></i> Go Home",
      "link": "<?php echo base_url(); ?>",
      "number": " <i class='fa fa-home blink-1' ></i>",

    },
    {
      "title": " <i class='fa fa-users blink-1' style='font-size:25px;'></i> Total Students",
      "link": "<?=base_url('admin/student');?>",
      "number": "<?php echo $users; ?>",

    },
   
    {
      "title": " <i class='fa fa-bullhorn blink-1 '  style='font-size:25px;'></i> Public Notices",
      "link": "<?=base_url('admin/notice');?>",
      "number": "<?php echo $notices; ?>",
    },
 
  
    {
      "title": "<i class='fa fa-book blink-1 '  style='font-size:25px;'></i> Study Materials",
      "link": "<?=base_url('admin/Study_Material');?>",
      "number": "<?php echo "0"; ?>",
    },

    {
      "title": "<i class='fa fa-paypal blink-1 ' style='font-size:25px;'></i> Total Earnings", 
      "link": "<?=base_url('admin/tuition-fees-table');?>",
      "number": "<i class='fa fa-inr'></i> <?php echo $earning; ?>",
    },

    {
      "title": "<i class='fa fa-paypal blink-1 '  style='font-size:25px;'></i> <?=date('M');?> Earnings", 
      "link": "<?=base_url('admin/tuition-fees-table');?>",
      "number": "<i class='fa fa-inr'></i> <?php echo $earning_month; ?>",
    },
   
    {
      "title": "<i class='fa fa-users blink-1 '  style='font-size:25px;'></i> Online Users",

      "link": "<?=base_url('admin/student');?>",
      "number": "<?php echo $online; ?>",
    }


  ];

  var cardColor = ['bg-primary', 'bg-success', 'bg-danger', 'bg-info', 'bg-dark', 'bg-dark-yellow', 'bg-dark-green', 'bg-dark-blue', 'bg-danger', 'bg-secondary', 'bg-dark-yellow', 'bg-success'];

  // generate color  automatically from this array








  var myHTML = '';

  for (var i = 0; i < myData.length; i++) {
    myHTML += '<div class="col-md-3 my-2">';
    myHTML += '<div class="card shadow border-0">';
    myHTML += '<div class="card-body rounded text-white  ' + cardColor[i] + '" >';
    myHTML += '<h5 class="card-title">' + myData[i].title + '</h5>';
    // divider line
    myHTML += '<hr class="bg-white my-0">';
    myHTML += '<button class="btn btn-light btn-sm mt-2 mx-2 font-weight-bold " style="font-size:16px;">' + myData[i].number + '</button>';
    myHTML += '<a href="' + myData[i].link + '"  target="_blank" class="btn btn-outline-light mt-2 btn-sm ">Go <i class="fa fa-external-link"></i></a>';


    myHTML += '</div>';
    myHTML += '</div>';
    myHTML += '</div>';
  }

  myContent.innerHTML = myHTML;



</script>