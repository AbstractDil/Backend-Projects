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
    
            <form class="form-signin ">
              <img class="mb-4" src="./assets/images/logo.png" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Create Account</h1>
              <label for="fname" class="sr-only">Fullname</label>
              <input type="text" id="fname" class="form-control" placeholder="Your full name" required autofocus="" name="fname" pattern="[A-Za-z ]{3,}" >
              <label for="uemail" class="sr-only">Email address</label>
              <input type="email" id="uemail" name="uemail" class="form-control" placeholder="Email address" required autofocus="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter valid email address">

              <label for="Password" class="sr-only">Password</label>
              <input type="password" name="pwd" id="Password" class="form-control" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <label for="cPassword" class="sr-only">Confirm Password</label>
              <input type="password" name="cpwd" id="cPassword" class="form-control" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <!-- <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div> -->
              <button class="btn btn-lg btn-violet btn-block mt-4" type="submit">Sign up</button>
              <!-- <p class="mt-5 mb-3 text-muted">© <span id="showYear"></span></p> -->
              <p class="mt-5 mb-3">
                Already have an account? <a href="?p=signin"> Sign in</a>
              </p>

              <p>
                <a href="?p=home">Back to Home</a>
              </p>

             

            </form>

</div>
</div>


