

<!-- top footer -->

  <div class="container-fluid top-footer text-white pt-5 pb-2 d-print-none">
    <div class="container">
      <div class="row">



      <div class="col-md-4">
          <h5 class="text-warning">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white"><i class="fa fa-chevron-circle-right"></i> Home</a></li>
            <li><a href="#" class="text-white"><i class="fa fa-chevron-circle-right"></i> User Manual</a></li>
            <li><a href="#" class="text-white"><i class="fa fa-chevron-circle-right"></i> Educator Profile</a></li>
            <li><a href="#" class="text-white"><i class="fa fa-chevron-circle-right"></i> Contact Us</a></li>
          </ul>
        </div>

        <div class="col-md-4">
        <h5 class="text-warning">Contact Us</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Address: Santipur, Nadia, West Bengal, India.</a></li>
            <li><a href="#" class="text-white">Phone: +91 6295980525</a></li>
            <li><a href="#" class="text-white">Email: nandysagar@yahoo.com

            </a></li>
          </ul>

        
         



          
         

        </div>
       
        <div class="col-md-4">
          


          <div class="d-flex logo-2 ">

<a href="index.html">
<img src="<?=base_url();?>assets/images/logo.png" alt="logo">
</a>
  <div class="logo-text p-2">
<h1 class="mb-0">MSMS</h1>
<p class="text-muted">
  MathHub Student Management System
  <br>
  Santipur, Nadia
</p>

</div>
  
</div>

        </div>
      </div>
    </div>
  </div>
  <!-- top footer ends -->


  <!-- footer start -->
  <footer class="d-inline-block w-100 float-left bg-dark text-white d-print-none">
    <div class="float-left w-100 pt-3 text-center">
      <div class="container">
        <div class="float-left w-100 text-center">
          <div class="row">
            <div class=" col-md-6 ">
              <p>© <span id="Year"></span> <span class="text-warning">MSMS</span> | All Rights Reserved.</p>
            </div>
            <div class=" col-md-6">
              <span> Designed &amp; Developed by <span class="text-warning">Sagar Nandy</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer ends -->

 <!-- footer ends -->
 <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url();?>assets/js/main.js?v=<?=time();?>"></script>

  <script>
    // Admin Login Btn 

function adminLoginBtn(){
  window.location.href = "<?php echo base_url('admin/login'); ?>";
}
  </script>

        </body>
</html>