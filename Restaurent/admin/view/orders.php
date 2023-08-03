<section class="jumbotron text-center">
  <div class="container">
    <h3 class="jumbotron-text">
      <i class="fa fa-cart-plus"></i>
      Orders Management
    </h3>
  </div>
</section>

<section class="container my-5 ">
  <div class="row">
    <div class="col-sm-12">

     <div class="card">
        <div class="card-header bg-info">
            <h4 class="text-white">
                <i class="fa fa-cart-plus"></i>
                Orders
            </h4>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                  <!-- user table starts -->
        
              <table class="table  table-striped table-bordered table-hover" id="ordersTable">
                <thead class="thead-dark">
                  <tr>
                    <th>SN</th>
                    <th>
                        Order ID
                    </th>
                    <th>User ID</th>
                    <th>
                        Menu Items ID
                    </th>

                    <th>
                        Item Name
                    </th>
       
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>
                       Payment Method
                    </th>

                    <th>
                        Table No
                    </th>

                    <th>
                        Date & Time
                    </th>

                    <th>
                        Status
                    </th>

                   
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                <!-- Loading Btn -->

                <tr>
                    <td colspan="12" class="text-center">
                        <button class="btn btn-lg btn-light" id="loading">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading orders...
                        </button>
                    </td>
                </tr>
               
                </tbody>
              </table>
       
              <!-- user table ends -->

              <!-- Modal -->
<div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="editOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="editOrderModalLabel">
            <i class="fa fa-edit"></i>
            Order Status
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <!-- Change Order item Status -->

      <form id="changeOrderStatusForm">

      <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="text" name="order_id" id="order_id" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Select Status</option>
                    <option value="0">Pending</option>
                    <option value="1">Accepted</option>
                    <option value="2">Delievered</option>
                    <option value="3">Cancelled</option>
                </select>
            </div>


            
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm rounded-pill" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info rounded-pill btn-sm" id="chngOrderStatusBtn">
                <i class="fa fa-save"></i>
                Save Changes
            </button>
          

      </form>
       
      </div>
    </div>
  </div>
</div>
       
            </div>

        </div>
     </div>

    </div>
  </div>
</section>



<script>
    // fetch all items from database using ajax
     
    $(document).ready(function () {
  
   setInterval(function(){

    $.ajax({
      url: "../controller/fetchOrders_controller.php",
      type: "GET",
      dataType: "html",
        success: function (data) {
           // console .log(data);
            var items = JSON.parse(data);
            var html = "";
            for (var i = 0; i < items.length; i++) {
            html += "<tr>";
            html += "<td>" + (i + 1) + "</td>";
            html += "<td>" + items[i].id + "</td>";
            html += "<td><i class='fa fa-user'></i> " + items[i].user_id + "</td>";
            html += "<td>" + items[i].menu_items_id + "</td>";
            html += "<td>" + items[i].item_name + "</td>";
            html += "<td>" + items[i].quantity + "</td>";
            html += "<td>" + items[i].price + "</td>";
            html += "<td>" + items[i].method + "</td>";
            html += "<td>" + items[i].table_no + "</td>";
          



           
            // change date format to dd-mm-yyyy hh:mm:ss AM/PM using javascript
            var date = new Date(items[i].datetime);
            var day = date.getDate();
            var month = date.getMonth() + 1;

            if(day < 10){
                day = "0" + day;
            }

            if(month < 10){
                month = "0" + month;
            }

            var year = date.getFullYear();
           
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            if (hours > 12) {
                hours = hours - 12;
                var am_pm = "PM";
            }
            else {
                var am_pm = "AM";
            }

            if (hours == 0) {
                hours =  12;
            }

            if(hours < 10){
                hours = "0" + hours;
            }

            if (minutes < 10) {
                minutes = "0" + minutes;
            }

            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            var datetime = day + "/" + month + "/" + year + " " + hours + ":" + minutes + ":" + seconds + " " + am_pm;

            html += "<td>" + datetime + "</td>";

            if(items[i].status == 0){
                html += "<td><span class='badge badge-warning'>Pending</span></td>";
            }
            else if(items[i].status == 1){
                html += "<td><span class='badge badge-info'>Accepted</span></td>";
            }

            else if(items[i].status == 2){
                html += "<td><span class='badge badge-success'>Delievered</span></td>";
            }
            else{
                html += "<td><span class='badge badge-danger'>Cancelled</span></td>";
            }

          
           // html += "<td>" + items[i].datetime + "</td>";
            html += "<td>";
            html += "<button data-toggle='modal' data-target='#editOrderModal' class='btn btn-sm btn-success rounded-circle m-1'>";
            html += "<i class='fa fa-edit'></i>";
            html += "</button>";
            html += "<button class='btn btn-sm rounded-circle btn-danger' data-id='" + items[i].id + "' id='deleteBtn'>";
            html += "<i class='fa fa-trash'></i>";
            html += "</button>";
            html += "</td>";
            html += "</tr>";
            }
            $("#ordersTable tbody").html(html);
        },

        error: function (err) {
            console.log(err);
        },

        complete: function () {
           // $("#loading").hide();
            $("#ordersTable").DataTable();
            $("#ordersTable").show();

            

             
        }



    });

    }, 3000);
       
    });

    // change order status using ajax

    $(document).on("click", "#ordersTable button", function () {
        var order_id = $(this).parents("tr").find("td:nth-child(2)").text();
        var status = $(this).parents("tr").find("td:nth-child(11)").text();
        $("#order_id").val(order_id);
        $("#status").val(status);
    });

    $(document).on("submit", "#changeOrderStatusForm", function (e) {
        e.preventDefault();

    $("#chngOrderStatusBtn").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Saving Changes...");

        var data = $(this).serialize();
        $.ajax({
            url: "../controller/changeOrdersStatus_controller.php",
            type: "POST",
            data: data,
            success: function (data) {
                if (data == "success") {
                    alert("Order Status Changed Successfully.");
                    $("#editOrderModal").modal("hide");
                    // reload page
                    location.reload();
                }
                else {
                    alert("Error Occured.");
                }
            },
            error: function (err) {
                console.log(err);
            },
            complete: function () {
               

                $("#chngOrderStatusBtn").html("<i class='fa fa-save'></i> Save Changes");
                
            }
        });
    });



    // delete order using ajax

    $(document).on("click", "#ordersTable #deleteBtn", function () {
        var id = $(this).data("id");
        var tr = $(this).parents("tr");

       
        
        var confirmation = confirm("Are you sure you want to delete this order?");
        if (confirmation) {


            // disable delete button

            $(this).attr("disabled", "disabled");

             // show loader button 

        $(this).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");

            $.ajax({
                url: "../controller/deleteOrder_controller.php",
                type: "POST",
                data: { id: id },
                success: function (data) {
                    if (data == "success") {
                        alert("Order Deleted Successfully.");
                        tr.remove();
                    }
                    else {
                        alert("Error Occured.");
                    }
                },
                error: function (err) {
                    console.log(err);
                    alert("Error Occured. Please try again later.");
                },
                complete: function () {
                    // enable delete button
                    $("#ordersTable #deleteBtn").removeAttr("disabled");
                    // hide loader button
                    $("#ordersTable #deleteBtn").html("<i class='fa fa-trash'></i>");
                }
            });
        }
    });


   


   
  

</script>