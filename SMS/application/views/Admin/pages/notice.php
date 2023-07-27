<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

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
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">




    <h2> 
    <i class="fa fa-bullhorn"></i>    
    Notices</h2>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#createBody">
          <i class="fa fa-plus"></i>
          Create Notice </button>
        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> --> 
        

        <!-- Modal -->
        <div class="modal fade" id="createBody" data-backdrop="static" data-keyboard="false" tabindex="-1"
          aria-labelledby="createBodyLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="createBodyLabel">
                  <i class="fa fa-bullhorn"></i>

                  Create Notice
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <?php

                echo form_open(base_url().'admin/notice/create' , 'id="noticeForm"');
                ?>



                <div class="form-row">
                  <div class="form-group col-md-12">
                      <i class="fa fa-info-circle"></i>
                    <label for="title">Notice Title
                     
                    </label>
                    <input type="text" class="form-control" id="title" name="title" 
                      max-length="50" min-length="3" pattern="[a-zA-Z0-9\s]+" required>


                  </div>

                  <div class="form-group col-md-12">
                    <label for="link">
                      <i class="fa fa-link"></i>
                      Notice Link</label>
                    <input type="url" class="form-control" id="link" name="link"
                      >


                  </div>

                  <div class="form-group col-md-12">
              <label for="role">
              <i class="fa fa-check-circle"></i>

              Status
              </label>

              <select class="form-control form-control-sm" name="status" id="role">
                <option>Select any one</option>
                  <option value="0">Show None</option>
                  <option value="1">Show in Latest News</option>
                  <option value="2"> Show in Public Notice</option>
                  <option value="3">Show in Modal</option>
                  <option value="4">Show in Modal & Public Notice</option>
                  <option value="5">Show in Modal & Latest News</option>
                  <option value="6">Show in All</option>
                  <option value="7">Show in Carousel</option>
                  <option value="8">Show in Public  & Latest News</option>





              

              </select>
              </div>  

                 

                </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                  <i class="fa fa-close"></i>
                  Close</button>
                <button type="submit" class="btn btn-success" id="submit"> <i class="fa fa-save"></i> Save</button>
              </div>

              <?php

             
                echo form_close();


              


                ?>




            </div>
          </div>
        </div>


      </div>


    </div>
  </div>

  <!-- test div -->

  

   <!-- test div -->

  <div class="table-responsive-sm bg-white p-2">




    <table class="table table-hover   table-sm responsive" id="isNoticeTable">
      <thead class="bg-primary text-white">
        <tr>
          <th scope="col">Sl. No. </th>
          <th scope="col">Created On</th>
          <th scope="col">Notice Title</th>
          <th scope="col">Notice Link</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>

          
        </tr>
      </thead>
      <tbody>
    <?php
    
    if(!empty($notices )){
      
      $i=0;

      foreach ($notices  as $row) {

       

        $i++;
        
      

        ?>
        <tr>
          <td>
          
            <?php echo $i; ?>

          </td>
          <td>
        
            <?php
            $date = date_create($row['Date_Time']);
            echo date_format($date,"M d, Y; h:i:s A");

            ?>

          </td>
          <td>
        
            <?php echo $row['notice_title']; ?>

          </td>
            
          <td><a href=" <?php echo $row['notice_link']; ?> ">
              <span class="badge badge-pink " style="font-size:12px;">
                <i class="fa fa-external-link"></i>
                Visit link </span>
            </a>
          </td>
        

          <td>
             <?php
            
            if($row['status'] == 1){
              ?>
            <span class="badge badge-warning">Latest News</span>
            <?php
            }
            ?>
             <?php
            if($row['status'] == 2){
              ?>
            <span class="badge badge-warning">Public Notice</span>
            <?php
            }
            ?>

<?php
            if($row['status'] == 3){
              ?>
            <span class="badge badge-warning">Modal</span>
            <?php
            }
            ?>

<?php
            if($row['status'] == 0){
              ?>
            <span class="badge badge-warning">None</span>
            <?php
            }
            ?>

<?php
            if($row['status'] == 4){
              ?>
            <span class="badge badge-warning">Modal & Public Notice</span>
            <?php
            }
            ?>

<?php
            if($row['status'] == 5){
              ?>
            <span class="badge badge-warning">Modal & Latest News<</span>
            <?php
            }
            ?>
            <?php
            if($row['status'] == 6){
              ?>
            <span class="badge badge-warning">All</span>
            <?php
            }
            ?>

<?php
            if($row['status'] == 7){
              ?>
            <span class="badge badge-warning">
              Carousel
            </span>
            <?php
            }
         
            ?>
            
            <?php
            if($row['status'] == 8){
              ?>
            <span class="badge badge-warning">
              Public & Latest News
            </span>
            <?php
            }
         
            ?>
            


          
          </td>

<td>

   <!-- Share to Whatsapp Button -->
   <a href="https://wa.me/?text=<?=$row['notice_title'];?> <?=base_url('share/'.$row['url_slug']);?>" target="_blank" class="btn btn-success btn-sm">
  <i class="fa fa-whatsapp"></i>
  </a>

            <a href="<?=base_url();?>admin/notice/edit/<?=$row['sno'];?>" class="btn btn-info btn-sm">
              <i class="fa fa-edit"></i>
            </a>
            
            <a href="javascript:void();" class="btn btn-danger btn-sm" 
            onclick="deleteNotice(<?=$row['sno'];?>)">
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

</main>

<script>

  $(document).ready(function() {
    $('#noticeForm').on('submit', function() {
      $('#submit').html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
      $('#submit').attr('disabled', true);
    });
  });


  function deleteNotice(id) {
    swal({
          title: "Are you sure?",
          
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
           console.log(id);
           window.location.href = "<?=base_url();?>admin/notice/delete/"+id;
          } else {
            swal("Your imaginary file is safe!");
          }
        });
  }
 


 

 
</script>