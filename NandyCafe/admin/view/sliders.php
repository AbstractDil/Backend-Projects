<section class="jumbotron text-center">
  <div class="container">
    <h3 class="jumbotron-text">
  
    <i class="fa fa-product-hunt"></i>
    Slider Management
        
    </h3>
  </div>
</section>

<section class="container my-5 ">
  <div class="row">
    <div class="col-sm-12">

     <div class="card">
        <div class="card-header bg-info">
            <h4 class="text-white">
                <i class="fa fa-product-hunt"></i>
                Slider Management 
            </h4>
        </div>
        <div class="card-body ">

        <!-- Add product Modal -->
        <!-- Button trigger modal -->
<button type="button" class="btn btn-warning rounded-pill float-right mb-2" data-toggle="modal" data-target="#addProductModal">
    <i class="fa fa-plus"></i>
  Add Slider
</button>

<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">
            <i class="fa fa-plus"></i>
            Add Slider
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="addProductForm">
  <div class="form-group">
    <label for="title">Slider Title</label>
    <input type="text" class="form-control" name="title" id="title" minlength="3" maxlength="50" required>
   
  </div>
   
   

<div class="form-group">
    <label for="image">Slider Image</label>
    <input type="file" class="form-control" id="image" name="image" onchange="previewImage(this)" required   accept=".jpg,.jpeg,.png" />
    <small class="text-muted">
        Only jpg, jpeg and png files are allowed.
    </small>
    <div>
    <img src="" id="previewImg" alt="Slider Image Preview" class="img-fluid mt-2 border border-dark img-thumbnail" width="200px">

    </div>
    </div>

   

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

            <div class="table-responsive">
                  <!-- product table starts -->
        
              <table class="table  table-striped table-bordered table-hover" id="productsTable">
                <thead class="thead-dark">
                  <tr>
                    <th>SN</th>
                    <th>Image</th>
                    <th>
                      Slider ID
                    </th>
                    <th>Slider Title</th>
                    <th>Date &amp; Time</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                

              

               <!-- Loading Btn -->

               <tr>
                    <td colspan="8" class="text-center">
                        <button class="btn btn-lg btn-light" id="loading">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading orders...
                        </button>
                    </td>
                </tr>

                </tbody>
              </table>
        
              <!-- product table ends -->
        
            </div>

        </div>
     </div>

    </div>
  </div>
</section>

<script>
    // preview image before upload
    function previewImage(input) {
       
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $("#previewImg").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }


    // insert product and upload image using ajax 

   // $("#productsTable").DataTable();


    $(document).ready(function () {
        $("#addProductForm").on("submit", function (e) {
            e.preventDefault();

            // show button loader
            $("#addProductModal button[type=submit]").html(
                '<i class="fa fa-circle-o-notch fa-spin"></i> Saving...'
            );

            var formData = new FormData(this);
            $.ajax({
                url: "../controller/addSlider_controller.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    if (data == "success") {
                        alert("Slider Added Successfully");
                        $("#addProductModal").modal("hide");
                        $("#addProductForm")[0].reset();
                        $("#previewImg").attr("src", "");
                       // $("#productsTable").DataTable().ajax.reload();
                       $("#productsTable").DataTable();

                    } else {
                        alert("Slider Not Added");
                    }
                },

                error: function (err) {
                    console.log(err);
                },

                complete: function () {
                    console.log("Request Finished");
                    // hide button loader
                    $("#addProductModal button[type=submit]").html(
                        '<i class="fa fa-check"></i> Save Changes'
                    );
                }

            });
        });
    });

    // fetch all products using ajax

    $(document).ready(function () {
  
  setInterval(function(){

   $.ajax({
     url: "../controller/fetchSliders_controller.php",
     type: "GET",
     dataType: "html",
       success: function (data) {
          // console .log(data);
           var items = JSON.parse(data);
           var html = "";
           for (var i = 0; i < items.length; i++) {

            var image = items[i].image;
            var title = items[i].title;
            var datetime = items[i].datetime;

          

            var id = items[i].id;
         
            
            html += "<tr>";
            html += "<td>" + (i + 1) + "</td>";
            html += "<td><img src='../assets/images/" + image + "' alt='" + title + "' class='img-thumbnail' width='100px'></td>";
            html += "<td>" + id + "</td>";
            html += "<td>" + title + "</td>";

            html += "<td>" + datetime + "</td>";
            html += "<td>";
            //html += "<button class='btn btn-sm btn-warning rounded-pill' id='editBtn' data-id='" + id + "'><i class='fa fa-edit'></i></button>";

            html += "<button class='btn btn-sm btn-danger rounded-pill' id='deleteBtn' data-id='" + id + "'><i class='fa fa-trash'></i></button>";
            html += "</td>";
            html += "</tr>";



           
           }
           $("#productsTable tbody").html(html);
       },

       error: function (err) {
           console.log(err);
       },

       complete: function () {
          // $("#loading").hide();
           $("#productsTable").DataTable();
           $("#productsTable").show();

           

            
       }



   });

   }, 3000);
      
   });

   // delete product using ajax

    $(document).ready(function () {
        $(document).on("click", "#deleteBtn", function () {

          
          
          $(this).html(loading);
          
          var id = $(this).data("id");

          var element = this;
          // disable delete button
          $(element).attr("disabled", "disabled");

           




  
            if (confirm("Are you sure?")) {
                 // show loader in delete button
            $(element).html(
                '<i class="fa fa-spinner fa-spin"></i>'
            );
                $.ajax({
                    url: "../controller/deleteSlider_controller.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        if (data == "success") {
                            $(element).closest("tr").fadeOut();
                            alert("Slider Deleted Successfully");
                        } else {
                            alert("Slider Not Deleted");
                        }
                    },
  
                    error: function (err) {
                        console.log(err);
                        alert("Something went wrong, please try again later.");
                    },
  
                    complete: function () {
                        console.log("Request Finished");
                        // hide button loader
                        $(element).html(
                            '<i class="fa fa-trash"></i>'
                        );
                    }
  
                });
            }
        });
    });




</script>