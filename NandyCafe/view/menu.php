<main role="main">
<section class="jumbotron text-center mb-5">
        <div class="container">
          <h3 class="jumbotron-text display-4">
            <i class="fa fa-cutlery"></i>
        Our Menu
          </h3>
         
        </div>
      </section>

      <div class="container text-center menu-items ">

      <h2 class=" text-violet text-uppercase font-weight-bold mb-5">
        Our Non-Veg Items
      </h2>
  
      <!-- Non Veg Container Starts -->
      <!-- Three columns of text below the carousel -->
      <div class="row">
        
       
      <?php

$sql = "SELECT * FROM menu_items_tbl WHERE category='NonVeg'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_assoc($result)){

      ?>

<div class="col-md-4  mb-5">
  <!-- Menu items Card Starts -->
  <div class="card shadow border-0">
    <img src="./assets/MenuItems/<?php echo $row['image'] ;?>" width="328" height="246" class="card-img-top" alt="">
    <div class="card-body">

      
              <h3 class="card-title">
                <?php echo $row['title']; ?>
              </h3>
              <p class="card-text">
                <span class="text-danger">
                  Price: &#8377; <?php echo $row['price']; ?> /-
                </span> <span class="badge badge-success rounded-pill px-2"> Rating: 
                <?php echo $row['rating']; ?>★ </span>
                   </span>
              </p>
              <form id="addToCart">
                        <input type="hidden" name="menu_items_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
          <button type="submit" class="btn btn-warning rounded-pill px-4" > 
            <i class="fa fa-cart-plus"></i> 
            Add To Cart 
          </button> 
          </form>
    </div>
  </div>
  <!-- Menu items Card Ends -->
</div><!-- /.col-lg-4 -->



      <?php
  }
}
else{
  echo "No Items Found";
}



?>

        
      </div><!-- /.row -->
     
      <hr class="featurette-divider">
      <!-- Non Veg Container Starts -->


        <!-- Veg Container Starts -->

        <h2 class=" text-violet text-uppercase font-weight-bold mb-5">
        Our Veg Items
      </h2>

        <div class="row">
        
        <?php

        $sql = "SELECT * FROM menu_items_tbl WHERE category='Veg'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){

          while($row = mysqli_fetch_assoc($result)){

              ?>

<div class="col-md-4  mb-5">
          <!-- Menu items Card Starts -->
          <div class="card shadow border-0">
            <img src="./assets/MenuItems/<?php echo $row['image'] ;?>" width="328" height="246" class="card-img-top" alt="">
            <div class="card-body">

              
                      <h3 class="card-title">
                        <?php echo $row['title']; ?>
                      </h3>
                      <p class="card-text">
                        <span class="text-danger">
                          Price: &#8377; <?php echo $row['price']; ?> /-
                        </span> <span class="badge badge-success rounded-pill px-2"> Rating: 
                        <?php echo $row['rating']; ?>★ </span>
                           </span>
                      </p>
                      <p class="text-center"> 
                        <form id="addToCart">
                        <input type="hidden" name="menu_items_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
          <button type="submit" class="btn btn-warning rounded-pill px-4" > 
            <i class="fa fa-cart-plus"></i> 
            Add To Cart 
          </button> 
          </form>
        </p> 
            </div>
          </div>
          <!-- Menu items Card Ends -->
        </div><!-- /.col-lg-4 -->



              <?php
          }
        }
        else{
          echo "No Items Found";
        }



        ?>
        
      

        
      </div><!-- /.row -->

      <hr class="featurette-divider">

        <!-- Veg Container Ends -->


      </div>

<script>
   // add to cart using ajax 

   $(document).on("submit", "#addToCart", function(e){
      e.preventDefault();

      <?php 

      // if user is not logged in then redirect to login page

      if(!isset($_SESSION['uid'])){
        ?>
        alert("Please Login First");
        window.location.href = "?p=signin";
        <?php
      }
      ?>

      var data = $(this).serialize();
      //console.log(data);
      $.ajax({
        url: "controller/addToCart_controller.php",
        type: "POST",
        data: data,
        success: function(data){
          alert(data);
          window.location.reload();
        }
      });
    });

</script>