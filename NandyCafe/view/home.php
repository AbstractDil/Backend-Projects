

  
  <main role="main">
  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item">
        

          <img src="./assets/images/c1.jpeg" alt="">
  
          <div class="container">
            <div class="carousel-caption">
              <h1>
                Welcome to Mr. Deb Restaurant
              </h1>
              <p>Some representative placeholder content for the first slide of the carousel.</p>
              <p><a class="btn btn-lg btn-warning rounded-pill" href="?p=signup">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item active">
      
  
          <img src="./assets/images/c2.jpeg" alt="">

          <div class="container">
            <div class="carousel-caption">
              <h1>
                Welcome to Mr. Deb Restaurant
              </h1>
              <p>
                Special Chicken With Laccha Paratha
              </p>
              <p><a class="btn btn-lg btn-warning rounded-pill" href="?p=about-us">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
         

          <img src="./assets/images/c3.jpg" alt="">

  
          <div class="container">
            <div class="carousel-caption">
              <h1>
                Welcome to Mr. Deb Restaurant
              </h1>
              <p>Some representative placeholder content for the third slide of this carousel.</p>
              <p><a class="btn btn-lg btn-warning rounded-pill" href="?p=menu">Menu Items</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  
  
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
  
    <div class="container text-center menu-items">

      <h2 class=" text-violet text-uppercase font-weight-bold mb-5">
        Our Special Menu
      </h2>
  
      <!-- Three columns of text below the carousel -->
      <div class="row" id="menuItems">
        
      <!-- Generate menuItems Using javascript -->

        
      </div><!-- /.row -->
      <a href="?p=menu" class="float-right btn btn-light"> View All Menu Items »</a>
  
  
      <!-- START THE FEATURETTES -->
  
      <hr class="featurette-divider">
  
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">
            Chicken Biryani,
             <span class="text-muted">It’ll blow your mind.</span></h2>
          <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class="col-md-5">
       
          <img src="./assets/MenuItems/ChickenBiryani.jpg" width="500" height="500" class="img-fluid featurette-img" alt="">
  
        </div>
      </div>
  
      <hr class="featurette-divider">
  
      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading"> Muttton Biriyani <span class="text-muted">Oh yeah, it’s that good.</span></h2>
          <p class="lead">
            Some great placeholder content for the first featurette here. Imagine some exciting prose here.
          </p>
        </div>
        <div class="col-md-5 order-md-1">
          <img src="./assets/MenuItems/muttonBiriyani.jpg" width="500" height="500" class="img-fluid featurette-img" alt="">
  
        </div>
      </div>
  
      <hr class="featurette-divider">
  
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"> Chicken Crazy Fry, <span class="text-muted">And lastly, this one.</span></h2>
          <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
        </div>
        <div class="col-md-5">
          <img src="./assets/MenuItems/Chicken-Crazy-Fry.jpg" width="500" height="500" class="img-fluid featurette-img" alt=""> 

  
        </div>
      </div>
  
      <hr class="featurette-divider">
  
      <!-- /END THE FEATURETTES -->
  
    </div><!-- /.container -->
  
  
   
  </main>



  
  
  <script>


    // fetch menu items using ajax

    var menuItems = [];

    $.ajax({
      url: "controller/fetchMenuItems_controller.php",
      type: "GET",
      dataType: "json",
      success: function(data){
        menuItems = data;
        //console.log(menuItems);
        generateMenuItems();
      }
    });


    function generateMenuItems(){
      var html = "";
      for(var i = 0; i < 3; i++){
        html += `
        <div class="col-md-4 mb-5"> 
    <form id="addToCart">
    <input type="hidden" name="menu_items_id" value="${menuItems[i].id}">
    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
    <div class="card shadow border-0"> 
   <img src="./assets/MenuItems/${menuItems[i].image}" width="328" height="246" class="card-img-top" alt="">
      <div class="card-body"> 
        <h3 class="card-title"> ${menuItems[i].title} </h3> 
        <p class="card-text"> 
          <span class="text-danger"> Price: &#8377; ${menuItems[i].price} /- </span> 
          <span class="badge badge-success rounded-pill px-2"> Rating: ${menuItems[i].rating}★ </span> 
        </p> 
        <p class="text-center"> 
          <button type="submit" class="btn btn-warning rounded-pill px-4" > 
            <i class="fa fa-cart-plus"></i> 
            Add To Cart 
          </button> 
        </p> 
      </div>
    </div>
    </form>
  </div>
        `;
      }
      $("#menuItems").html(html);
    }

    // generate menu items using javascript

    /*

    var menuItems = [
      {
        id: 1,
        name: "Chicken Biryani",
        image: "./assets/MenuItems/ChickenBiryani.jpg",
        price: 200,
        rating: 4.5
      },
      {
        id: 2,
        name: "Mutton Biriyani",
        image: "./assets/MenuItems/muttonBiriyani.jpg",
        price: 300,
        rating: 4.5
      },
      {
        id: 3,
        name: "Chicken Crazy Fry",
        image: "./assets/MenuItems/Chicken-Crazy-Fry.jpg",
        price: 250,
        rating: 4.5
      }
    ];
   

    var menuItemsDiv = document.getElementById("menuItems");

    var menuItemsHtml = "";

    var menuItemCard = ` <div class="col-md-4 mb-5"> 
    <form id="addToCart">
    <input type="hidden" name="id" value="ID">
    <div class="card shadow border-0"> 
      <img src="IMAGE" width="328" height="246" class="card-img-top" alt=""> 
      <div class="card-body"> 
        <h3 class="card-title"> NAME </h3> 
        <p class="card-text"> 
          <span class="text-danger"> Price: &#8377; PRICE /- </span> 
          <span class="badge badge-success rounded-pill px-2"> Rating: RATING★ </span> 
        </p> 
        <p class="text-center"> 
          <a type="submit" class="btn btn-warning rounded-pill px-4" href="#"> 
            <i class="fa fa-cart-plus"></i> 
            Add To Cart 
          </a> 
        </p> 
      </div>
    </div>
    </form>
  </div>`;

    for (var i = 0; i < menuItems.length; i++) {
      var menuItem = menuItems[i];
      var menuItemCardHtml = menuItemCard
        .replace("ID", menuItem.id)
        .replace("IMAGE", menuItem.image)
        .replace("NAME", menuItem.name)
        .replace("PRICE", menuItem.price)
        .replace("RATING", menuItem.rating);
      menuItemsHtml += menuItemCardHtml;
    }

    menuItemsDiv.innerHTML = menuItemsHtml;

    */

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

