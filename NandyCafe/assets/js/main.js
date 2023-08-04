
/* Show Current Year
************************/

let showCurrentYear = document.getElementById("showYear");
let currentYear = new Date().getFullYear();
showCurrentYear.innerHTML = currentYear;

/* Signup Form Handler
 ************************/

$(document).ready(function () {
  $("#SignUpBtn").click(function (e) {
    e.preventDefault();

    var spinner =
      '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...';

    $("#SignUpBtn").html(spinner);
    // add disable attribute
    $("#SignUpBtn").attr("disabled", "disabled");

    var fname = $("#fname").val();
    var uemail = $("#uemail").val();
    var pwd = $("#Password").val();
    var cpwd = $("#cPassword").val();

    if (fname == "" || uemail == "" || pwd == "" || cpwd == "") {
      $("#showMsg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='	fa fa-warning'></i> All fields are required.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );

      // disable spinner

      $("#SignUpBtn").html("Sign up");

      // remove disable attribute

      $("#SignUpBtn").removeAttr("disabled");
    }

    // fullname validation
    else if (fname.length < 3) {
      $("#showMsg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> Fullname should be minimum 3 characters long.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );

      // disable spinner

      $("#SignUpBtn").html("Sign up");

      // remove disable attribute

      $("#SignUpBtn").removeAttr("disabled");
    }

    // pattern validation for fullname
    else if (!fname.match(/^[A-Za-z ]{3,}$/)) {
      $("#showMsg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> Fullname should contain only alphabets and space.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );

      // disable spinner

      $("#SignUpBtn").html("Sign up");

      // remove disable attribute

      $("#SignUpBtn").removeAttr("disabled");
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

      $("#SignUpBtn").html("Sign up");

      // remove disable attribute

      $("#SignUpBtn").removeAttr("disabled");
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

      $("#SignUpBtn").html("Sign up");

      // remove disable attribute

      $("#SignUpBtn").removeAttr("disabled");
    }

    // confirm password validation
    else if (pwd != cpwd) {
      $("#showMsg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> Password and confirm password should be same.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );

      // disable spinner

      $("#SignUpBtn").html("Sign up");

      // remove disable attribute

      $("#SignUpBtn").removeAttr("disabled");
    } else {
      $.ajax({
        url: "controller/addUserController.php",
        type: "POST",
        data: $("#SignUpForm input").serialize(),
        success: function (data) {
          if (data == "success") {
            $("#showMsg").html(
              "<div class='alert alert-success'><i class='	fa fa-check-circle'></i> Your account has been created successfully.</div>"
            );
       // redirect to login page after 2 seconds
            setTimeout(function () {
              window.location.href = "?p=signin";
            }, 3000);
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
        $("#SignUpBtn").html("Sign up");
        $("#SignUpBtn").removeAttr("disabled");

        // clear form data

        $("#SignUpForm input").val("");
      });
    }
  });
});


/* Signin Form Handler
 ************************/

$(document).ready(function () {
    $("#SignInBtn").click(function (e) {
        e.preventDefault();
    
        var spinner =
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...';
    
        $("#SignInBtn").html(spinner);
        // add disable attribute
        $("#SignInBtn").attr("disabled", "disabled");
    
        var uemail = $("#uemail").val();
        var pwd = $("#Password").val();
    
        if (uemail == "" || pwd == "") {
        $("#showMsg").html(
            "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> All fields are required.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
        );
    
        // disable spinner
    
        $("#SignInBtn").html("Sign in");
    
        // remove disable attribute
    
        $("#SignInBtn").removeAttr("disabled");
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
    
        $("#SignInBtn").html("Sign in");
    
        // remove disable attribute
    
        $("#SignInBtn").removeAttr("disabled");
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
    
        $("#SignInBtn").html("Sign in");
    
        // remove disable attribute

        $("#SignInBtn").removeAttr("disabled");

       

        }

        else {

            $.ajax({
                url: "controller/Signin_Controller.php",
                type: "POST",
                data: $("#SignInForm input").serialize(),
                success: function (data) {
                  if (data == "success") {
                    $("#showMsg").html(
                      "<div class='alert alert-success'><i class='	fa fa-check-circle'></i> You have logged in successfully. <p> <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Redirecting to home page... </p></div>"
                    );

                    // disable input fields

                    $("#SignInForm input").attr("disabled", "disabled");

                    // disable button

                    $("#SignInBtn").attr("disabled", "disabled");

                    // redirect to login page after 2 seconds
                    setTimeout(function () {
                      window.location.href = "?p=home";
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
                $("#SignInBtn").html("Sign in");
                $("#SignInBtn").removeAttr("disabled");
        
                // clear form data
        
                $("#SignInForm input").val("");
              });
        }
    });
});

/* Edit Profile Form Handler
  ************************/

  $(document).ready(function () {
    $("#EditProfileBtn").click(function (e) {
      e.preventDefault();
      var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...';
      $("#EditProfileBtn").html(spinner);
      // add disable attribute  
      $("#EditProfileBtn").attr("disabled", "disabled");
      var fname = $("#fname").val();
      var uemail = $("#uemail").val();
      //console.log(fname);
      if(fname == "" || uemail == ""){
        $("#showMsg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>All fields are required.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></div>");
        // disable spinner
        $("#EditProfileBtn").html("Edit Profile");
        // remove disable attribute
        $("#EditProfileBtn").removeAttr("disabled");
      }
      // fullname validation
      else if (fname.length < 3) {
        $("#showMsg").html(
          "<div class='alert alert-danger alert-dismissible fade show' role='alert'><i class='	fa fa-warning'></i> Fullname should be minimum 3 characters long.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></div>"
        );
        // disable spinner
        $("#EditProfileBtn").html("Edit Profile");
        // remove disable attribute
        $("#EditProfileBtn").removeAttr("disabled");
      }

      // pattern validation for fullname

      else if (!fname.match(/^[A-Za-z ]{3,}$/)) {
        $("#showMsg").html(
          "<div class='alert alert-danger alert-dismissible fade show' role='alert'> <i class='	fa fa-warning'></i> Fullname should contain only alphabets and space.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></div>"
        );
        // disable spinner
        $("#EditProfileBtn").html("Edit Profile");
        // remove disable attribute
        $("#EditProfileBtn").removeAttr("disabled");
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
  
        $("#EditProfileBtn").html("Edit Profile");
  
        // remove disable attribute
  
        $("#EditProfileBtn").removeAttr("disabled");
      }

      else {
        $.ajax({
          url: "controller/edit_profile_Controller.php",
          type: "POST",
          data: $("#EditProfileTable input").serialize(),
          success: function (data) {
            if (data == "success") {
              $("#showMsg").html(
                "<div class='alert alert-success'><i class='	fa fa-check-circle'></i> Your profile has been updated successfully.</div>"
              );
              // redirect to login page after 2 seconds
              setTimeout(function () {
                window.location.href = "?p=profile";
              }, 3000);
             
            } else if (data == "error") {
              alert("Something went wrong");
            } else {
              $("#showMsg").html(
                "<div class='alert alert-danger alert-dismissible fade show' role='alert'>" +
                  data +
                  "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></div>"
              );
            }
          },
        }).done(function () {
          $("#EditProfileBtn").html("Edit Profile");
          $("#EditProfileBtn").removeAttr("disabled");
  
          // clear form data
  
          $("#EditProfileForm input").val("");
        });
      }
        

    });
  });
