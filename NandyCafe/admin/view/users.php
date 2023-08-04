<section class="jumbotron text-center">
  <div class="container">
    <h3 class="jumbotron-text">
     <i class="fa fa-users"></i>
        Users Management
    </h3>
  </div>
</section>

<section class="container my-5 ">
  <div class="row">
    <div class="col-sm-12">

     <div class="card">
        <div class="card-header bg-info">
            <h4 class="text-white">
                <i class="fa fa-users"></i>
                Users 
            </h4>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                  <!-- user table starts -->
        
              <table class="table  table-striped table-bordered table-hover" id="usersTable">
                <thead class="thead-dark">
                  <tr>
                    <th>SN</th>
                    <th>
                      UserID
                    </th>
                    <th>Full Name</th>
                    <th>Email</th>
       
                    <!-- <th>Status</th> -->
                    <th>Role</th>
                    <th>Joined Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
               
                </tbody>
              </table>
       
              <!-- user table ends -->

              <!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="editUserModalLabel">
            <i class="fa fa-edit"></i>
            Edit User
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <!-- edit user form starts -->

        <!-- <form id="editUserForm" method="POST" action="../controller/updateUser_Controller.php"> -->
<form id="editUserForm">
        <!-- UserID -->
        <input type="number" class="form-control" id="uid" name="uid" readonly>

        <label for="fname" class="sr-only">Fullname</label>
              <input type="text" id="fname" class="form-control" placeholder="Your full name" required autofocus="" name="fname" pattern="[A-Za-z ]{3,}" >
              <label for="uemail" class="sr-only">Email address</label>
              <input type="email" id="uemail" name="uemail" class="form-control" placeholder="Email address" required autofocus="" title="Please enter valid email address">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded-pill btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success rounded-pill btn-sm">
            <i class="fa fa-save"></i>
            Save changes</button>
      </div>
      </form>
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
    // fetch all users from database using ajax
     
    $(document).ready(function () {
    // by default hide table 
    $("#usersTable").hide();  
 
    $.ajax({
      url: "../controller/fetchAllUsers_controller.php",
      type: "GET",
      dataType : "html",
        success: function (data) {
            // console .log("Hello Data");
            var users = JSON.parse(data);
            
            var html = "";
            for (var i = 0; i < users.length; i++) {
            html += "<tr>";
            html += "<td>" + (i + 1) + "</td>";
            html += "<td>" + users[i].id + "</td>";
            html += "<td><i class='fa fa-user'></i> " + users[i].fname + "</td>";
            html += "<td>" + users[i].uemail + "</td>";
            //html += "<td>" + users[i].status + "</td>";

            if(users[i].usertype == 1){
                users[i].role = "Admin";
            }
            else{
                users[i].role = "User";
            }

            html += "<td> <span class='badge badge-primary'> " + users[i].role + " </span></td>";
            // change date format to dd-mm-yyyy hh:mm:ss AM/PM using javascript
            var date = new Date(users[i].datetime);
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

          
           // html += "<td>" + users[i].datetime + "</td>";
            html += "<td>";
            html += "<button id='editBtn' class='btn btn-sm btn-success m-1' data-toggle='modal' data-target='#editUserModal'>";
            html += "<i class='fa fa-edit'></i>";
            html += "</button>";
            html += "<button class='btn btn-sm btn-danger m-1' id='userDltBtn'>";
            html += "<i class='fa fa-trash'></i>";
            html += "</button>";
            html += "</td>";
            html += "</tr>";
            }
            $("#usersTable tbody").html(html);
        },

        error: function (err) {
            console.log(err);
        },

        complete: function () {
           // $("#loading").hide();
            $("#usersTable").DataTable();
            $("#usersTable").show();
        }

    });
       
    });


    // delete user from database using ajax

    $(document).on("click", "#userDltBtn", function () {

         // disable delete button

        $(this).attr("disabled", "disabled");

        // show loading button  in delete button 
        
        var loading = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Deleting...";

       
        $(this).html(loading);
        
        


       
        var id = $(this).closest("tr").find("td:nth-child(2)").text();
        var tr = $(this).closest("tr");
        var dlt = confirm("Are you sure you want to delete this user?");
        if (dlt == true) {
            $.ajax({
                url: "../controller/deleteUser_controller.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    if (data == "success") {
                        tr.fadeOut(1000);
                        alert("User deleted successfully");
                    }
                    else {
                        alert("Error deleting user");
                    }
                },
                error: function (err) {
                    console.log(err);
                },
                complete: function () {
                    $("#userDltBtn").html("<i class='fa fa-trash'></i>");

                }
            });
        }
    });

    // edit user using ajax

    $(document).on("click", "#editBtn", function () {
        var id = $(this).closest("tr").find("td:nth-child(2)").text();
        var fname = $(this).closest("tr").find("td:nth-child(3)").text();
        var uemail = $(this).closest("tr").find("td:nth-child(4)").text();
        $("#editUserModal #fname").val(fname);
        $("#editUserModal #uemail").val(uemail);
        $("#editUserModal #uid").val(id);
       //$("#editUserModal #editUserForm").attr("action", "../controller/edit_profile_Controller.php?id=" + id );
    });

    // update user using ajax

    

    $("#editUserForm").on("submit", function (e) {
        e.preventDefault();
        var uid = $("#uid").val();
        var fname = $("#fname").val();
        var uemail = $("#uemail").val();

        // show loading button 

        $("#editUserModal button[type=submit]").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Updating...");

        
        $.ajax({
            url: "../controller/updateUser_Controller.php",
            type: "POST",
            data: {
                uid: uid,
                fname: fname,
                uemail: uemail
            },
            success: function (data) {
                if (data == "success") {
                    alert("User updated successfully");
                    $("#editUserModal").modal("hide");
                    window.location.reload();
                }
                else {
                    alert("Error updating user");
                }
            },
            error: function (err) {
                console.log(err);
            },
            complete: function () {
                $("#editUserModal button[type=submit]").html("Save changes");
            }
        });
        
        
    });
    
    

</script>