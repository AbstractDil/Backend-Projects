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
    
            <form class="form-signin mt-5" id="SignInForm">
              <img class="mb-4" src="./assets/images/logo.png" alt="" width="98" height="98">
              <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
              <!-- Show Msg -->
              <div id="showMsg"></div>

              <label for="uemail" class="sr-only">Email address</label>
              <input type="email" id="uemail" name="uemail" class="form-control" placeholder="Email address" required autofocus="" title="Please enter valid email address">

              <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  -->

              <label for="Password" class="sr-only">Password</label>
              <input type="password" name="pwd" id="Password" class="form-control" placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <button class="btn btn-lg btn-violet btn-block mt-4" id="SignInBtn">
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


