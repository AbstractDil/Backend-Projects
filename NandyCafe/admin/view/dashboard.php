


<section class="jumbotron text-center">
        <div class="container">
          <h3 class="jumbotron-text display-4">
       Admin Dashboard 
          </h3>
         
        </div>


        
    </section>

<section class="mt-5">


    <div class="container">

      
      <!-- Content Tabs Starts -->
      <div class="row my-5" id="contentTabs">
<!-- Content Tabs Ends -->

 

</div>
    
    </div>

</section>

<script>
  // generate row content using javascript
  var contentTabs = document.getElementById('contentTabs');
  var cData = [
    {
      "icon": "fa fa-users",
      "title": "User Management",
      "subtitle": "Total Users :<?php
      $sql = "SELECT * FROM user_tbl";
      $result = $conn->query($sql);
      echo $result->num_rows;
      ?>
      ",
      "link": "?p=dashboard&c=users" // c means content
    },
    {
      "icon": "fa fa-cart-plus",
      "title": "Orders Management",
      "subtitle": "Pending Orders: <?php 
      $sql = "SELECT * FROM order_tbl WHERE status = 0";
      $result = $conn->query($sql);
      echo $result->num_rows;
      ?>",
      "link": "?p=dashboard&c=orders"
    },
    {
      "icon": "fa fa-product-hunt",
      "title": "Product Management",
      "subtitle": "Total Products: <?php
      $sql = "SELECT * FROM menu_items_tbl";
      $result = $conn->query($sql);
      echo $result->num_rows;
      ?>",
      "link": "?p=dashboard&c=products"
    },
    
   
    {
      "icon": "fa fa-phone",
      "title": "Contact Form Data",
      "subtitle": "Total Sliders: <?php
      $sql = "SELECT * FROM contact_form_data_tble";
      $result = $conn->query($sql);
      echo $result->num_rows;
      ?>",
      "link": "?p=dashboard&c=contact_form_data"
    },
  
    

   
  ]

  var html = '';
  for (var i = 0; i < cData.length; i++) {
    html += '<div class="col-sm-4 my-2">';
    html += '<div class="card">';
    html += '<div class="card-body">';
    html += '<h5 class="card-title">';
    html += '<i class="' + cData[i].icon + '"></i> ';
    html += cData[i].title;
    html += '</h5>';
    html += '<p class="card-text">';
    html += cData[i].subtitle;
    html += '</p>';
    html += '<a href="' + cData[i].link + '" class="btn btn-warning btn-sm">';
    html += '<i class="	fa fa-external-link"></i> ';
    html += 'View Details';
    html += '</a>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
  }

  contentTabs.innerHTML = html;



</script>