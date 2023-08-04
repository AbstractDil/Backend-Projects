<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
          <h3 class="jumbotron-text display-4">
            <i class="fa fa-phone-square"></i>
            Contact Us 
          </h3>
         
        </div>
      </section>
  
  
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="text-center text-uppercase text-primary font-weight-bold">
                    Please fill up the form below to contact us
                </h3>
                <form class="mt-5" id="contactForm">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uemail" required>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="fullname">Fullname</label>
                      <input type="text" class="form-control" id="fullname" name="fname" required>
                    </div>
                    <div class="form-group ">
                        <label for="Subject">
                            Subject
                        </label>
                      <input type="text" class="form-control" id="Subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="Msg">Message</label>
                        <textarea class="form-control" id="Msg" rows="5" cols="50" name="msg" required></textarea>
                      </div>
                    <button type="submit" class="btn btn-warning btn-block">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    </main>

    <script>
      //Submit form using AJAX

      $("#contactForm").submit(function(e){
        e.preventDefault();

        //get all the inputs into an array
        var inputs = $("#contactForm :input");

        //get an associative array of just the values.
        var values = {};
        inputs.each(function(){
          values[this.name] = $(this).val();
        });


        // show loader button

        $(this).find('button[type=submit]').html("<i class='fa fa-spinner fa-spin'></i> Please wait...");



        // AJAX code to submit form
        $.ajax({
          type: "POST",
          url: "controller/contactUs_Controller.php",
          data: values,
          cache: false,
          success: function(data){
            //alert(data);
            if(data == "success"){
              alert("Thank you for contacting us. We will get back to you soon.");
              $("#contactForm")[0].reset();
            }
            else{
              alert("Error! Please try again.");
            }
          },
          error: function(err){
            alert(err);
          },
          complete: function(){
            // hide loader button
            $("#contactForm").find('button[type=submit]').html("Submit");
          }
        });

      });

    </script>
