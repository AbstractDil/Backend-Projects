<div class="container text-center mt-5">

<div class="d-flex align-items-center"
style=" display: -ms-flexbox;
display: flex;
-ms-flex-align: center;
align-items: center;
padding-top: 40px;
padding-bottom: 40px;
"

>
    
            <form class="form-signin mt-5" id="AdminSignInForm">
              <img class="mb-4" src="../assets/images/logo.png" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
              <!-- Show Msg -->
              <div id="showMsg"></div>

              <label for="uemail" class="sr-only">Email address</label>
              <input type="email" id="uemail" name="uemail" class="form-control" placeholder="Email address" required autofocus="" title="Please enter valid email address">

              <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  -->

              <label for="Password" class="sr-only">Password</label>
              <input type="password" name="pwd" id="Password" class="form-control" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <button class="btn btn-lg btn-violet btn-block mt-4" id="AdminSignInBtn">
                <i class="fa fa-sign-in"></i>
                Sign in</button>
              <!-- <p class="mt-5 mb-3 text-muted">© <span id="showYear"></span></p> -->
              <p class="mt-5 mb-3">
                Don't have an account? <a href="?p=signup"> Sign up</a>
              </p>

              <p>
                <a href="?p=home">
                  <i class="fa fa-home"></i>
                  Back to Home</a>
              </p>

             

            </form>

</div>
</div>


<script>
  /* Signin Form Handler
 ************************/

$(document).ready(function () {
    $("#AdminSignInBtn").click(function (e) {
        e.preventDefault();
    
        var spinner =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...';
    
        $("#AdminSignInBtn").html(spinner);
        // add disable attribute
        $("#AdminSignInBtn").attr("disabled", "disabled");
    
        var uemail = $("#uemail").val();
        var pwd = $("#Password").val();
    
        if (uemail == "" || pwd == "") {
        $("#showMsg").html(
            "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> All fields are required.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
        );
    
        // disable spinner
    
        $("#AdminSignInBtn").html("Sign in");
    
        // remove disable attribute
    
        $("#AdminSignInBtn").removeAttr("disabled");
        }
    
        // email validation
        else if (
        !uemail.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/) ||
        uemail.length < 5
        ) {
        $("#showMsg").html(
            "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> Please enter valid email address.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
        );
    
        // disable spinner
    
        $("#AdminSignInBtn").html("Sign in");
    
        // remove disable attribute
    
        $("#AdminSignInBtn").removeAttr("disabled");
        }
    
        // password validation
        else if (
        !pwd.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/) ||
        pwd.length < 8
        ) {
        $("#showMsg").html(
            "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> Password should contain at least one number and one uppercase and lowercase letter, and Password should be minimum 8 characters long.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
        );
    
        // disable spinner
    
        $("#AdminSignInBtn").html("Sign in");
    
        // remove disable attribute

        $("#AdminSignInBtn").removeAttr("disabled");

       

        }

        else {

            $.ajax({
                url: "../controller/AdminSignin_controller.php",
                type: "POST",
                data: $("#AdminSignInForm input").serialize(),
                success: function (data) {
                  if (data == "success") {
                    $("#showMsg").html(
                      "<div class='alert alert-success'><i class='	fa fa-check-circle'></i> You have logged in successfully. <p> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Redirecting to home page... </p></div>"
                    );

                    // disable input fields

                    $("#AdminSignInForm input").attr("disabled", "disabled");

                    // disable button

                    $("#AdminSignInBtn").attr("disabled", "disabled");

                    // redirect to login page after 2 seconds
                    setTimeout(function () {
                      window.location.href = "?p=dashboard&c=home";
                    }, 2000);
                  } else if (data == "error") {
                    alert("Something went wrong");
                  } else {
                    $("#showMsg").html(
                      "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                        data +
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
                    );
                  }
                },
              }).done(function () {
                $("#AdminSignInBtn").html("Sign in");
                $("#AdminSignInBtn").removeAttr("disabled");
        
                // clear form data
        
                $("#AdminSignInForm input").val("");
              });
        }
    });
});
</script>


