<section class="jumbotron text-center">
  <div class="container">
    <h3 class="jumbotron-text">
      <i class="fa fa-phone"></i>
     Contact Form  Data
    </h3>
  </div>
</section>

<section class="container my-5 ">
  <div class="row">
    <div class="col-sm-12">

     <div class="card">
        <div class="card-header bg-info">
            <h4 class="text-white">
                <i class="fa fa-phone"></i>
                Contact Form Data
            </h4>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                  <!-- user table starts -->
        
              <table class="table  table-striped table-bordered table-hover" id="contactTable">
                <thead class="thead-dark">
                  <tr>
                    <th>SN</th>
                    <th>
                        Contact ID
                    </th>
                    <th>Name</th>
                    <th>
                     Email
                    </th>

                    <th>
                        Subject
                    </th>
       
                    <th>Message</th>
                    

                    <th>
                        Date & Time
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
      url: "../controller/fetchContacts_controller.php",
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
            html += "<td><i class='fa fa-user'></i> " + items[i].fname + "</td>";
            html += "<td>" + items[i].uemail + "</td>";
            html += "<td>" + items[i].subject + "</td>";
            html += "<td>" + items[i].msg + "</td>";
          
          



           
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

            

          
           // html += "<td>" + items[i].datetime + "</td>";
            html += "<td>";
         
            html += "<button class='btn btn-sm rounded-circle btn-danger' data-id='" + items[i].id + "' id='deleteBtn'>";
            html += "<i class='fa fa-trash'></i>";
            html += "</button>";
            html += "</td>";
            html += "</tr>";
            }
            $("#contactTable tbody").html(html);
        },

        error: function (err) {
            console.log(err);
        },

        complete: function () {
           // $("#loading").hide();
            $("#contactTable").DataTable();
            $("#contactTable").show();

            

             
        }



    });

    }, 3000);
       
    });

   



    // delete conatact using ajax

    $(document).on("click", "#contactTable #deleteBtn", function () {
        var id = $(this).data("id");
        var tr = $(this).parents("tr");

       
        
        var confirmation = confirm("Are you sure you want to delete this order?");
        if (confirmation) {


            // disable delete button

            $(this).attr("disabled", "disabled");

             // show loader button 

        $(this).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");

            $.ajax({
                url: "../controller/deleteContact_controller.php",
                type: "POST",
                data: { id: id },
                success: function (data) {
                    if (data == "success") {
                        alert(" Contact Deleted Successfully.");
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
                    $("#contactTable #deleteBtn").removeAttr("disabled");
                    // hide loader button
                    $("#contactTable #deleteBtn").html("<i class='fa fa-trash'></i>");
                }
            });
        }
    });


   


   
  

</script>