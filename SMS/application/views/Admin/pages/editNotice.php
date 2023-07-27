

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<h2>
<i class="fa fa-bullhorn"></i>
    
Edit Notice </h2>

<?php

if(!empty($notice)){
    foreach ($notice as $row) {
        $sno = $row->sno;
        $title = $row->notice_title;
        $link = $row->notice_link;
        $status = $row->status;

         if($status == 1){
            $status = "Latest News";
        }else if($status == 2){
            $status = "Public Notice";
        }else if($status == 3){
            $status = "Modal";
        }
        else if($status == 4){
            $status = "Modal & Public Notice";
        }
        else if($status == 5){
            $status = "Modal & Latest News";
        }
        else if($status == 6){
            $status = "All";
        }
        else if($status == 7){
            $status = "Carousel";
        }
        else{
            $status = "Show None";
        }

        
    }
}

?>




</div>

<div class="container  bg-white p-2">
    <div class="row">
        <div class="col-md-6">
        <?php

echo form_open(base_url().'admin/notice/edit/confirm/'.$sno , array('id' => 'editForm'));
?>



<div class="form-row">
<div class="form-group col-md-12">
<label for="title">
<i class="fa fa-info-circle"></i>

    Notice Title</label>
<input type="text" class="form-control" id="title" name="title" value="<?=$title;?>" max-length="50" min-length="3"  required>


</div>

<div class="form-group col-md-12">
<label for="link">
<i class="fa fa-link"></i>

    Notice  Link</label>
<input type="url" class="form-control" id="link" name="link" value="<?=$link;?>" >


</div>


<div class="form-group col-md-12">
<label for="role">
<i class="fa fa-check-circle"></i>

    Change Status
</label>

<select class="form-control" name="status" id="role">
  <option> <?=$status;?></option>
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

<a href="<?=base_url('admin/notice')?>" class="btn btn-danger float-left">
<i class="fa fa-arrow-circle-left"></i>

Back</a>

<button type="submit" id="editBtn" class="btn btn-success float-right"> 
<i class="fa fa-save"></i>

Save Changes
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
    $('#editForm').on('submit', function() {
      $('#editBtn').html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
      $('#editBtn').attr('disabled', true);
    });
  });

</script>