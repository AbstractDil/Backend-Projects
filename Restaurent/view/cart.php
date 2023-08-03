<main role="main">
<section class="jumbotron text-center">
        <div class="container">
          <h3 class="jumbotron-text display-4">
            <i class="fa fa-shopping-cart"></i>
            My Cart
          </h3>

         
         </div>
        
      </section>
      
       
     
      <section class="container">

       <div class="row">

     

              <div class="col-md-10 offset-md-1">
                  <!-- Alert Msg -->

      

              <div class="alert alert-info">

                <div class="row">
                    <div class="col-md-6">
                        <h4>
                            <i class="fa fa-shopping-cart"></i>
                            My Cart
                        </h4>
                    </div>
                    <div class="col-md-6 text-right">

                    <!-- Check Order Btn  -->
                    <a href="?p=my-orders" class="btn btn-warning rounded-pill">
                            <i class="fa fa-cart-plus"></i>
                            My Orders
                        </a>

                        <a href="?p=home" class="btn btn-violet rounded-pill">
                            <i class="fa fa-shopping-cart"></i>
                            Continue Menu
                        </a>
                    </div>
                    </div>

              </div>

              <div class="alert alert-info table-responsive">
                  <!-- <form id="checkOutForm" method="POST" action="controller/confirmOrder_controller.php"> -->


<form id="checkOutForm">
                 

                  <table class="table table-hover table-bordered mt-3">
                       <thead class="thead-dark">
                            <tr>
                                <th>
                                    Product Image
                                </th>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Sub Total</th>
                              <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       <input type="hidden" name="user_id" value="<?php echo $_SESSION['uid']; ?>">
                       
                       <?php
                          // fetch cart data all products from database 
  
                          $sql = "SELECT * FROM cart_tbl WHERE user_id = '$_SESSION[uid]'";
                          $result = mysqli_query($conn, $sql);
  
                          if(mysqli_num_rows($result) > 0){
  
                              foreach($result as $row){
                               // store menu_items_id in array format
                                  $menu_items_id = explode(",", $row['menu_items_id']);
                                  
                                  $cart_id = $row['id'];

                                // fetch all menu items from database
                                  $sql = "SELECT * FROM menu_items_tbl WHERE id IN (".implode(',', $menu_items_id).")";
                                  // echo $sql;
                                  $result = mysqli_query($conn, $sql);
  
                                  foreach($result as $row){
                                      ?>
                       <input type="hidden" name="user_id[]" value="<?php echo $_SESSION['uid']; ?>">

                                        <input type="hidden" name="menu_items_id[]" value="<?php echo $row['id']; ?>">

                                        <input type="hidden" name="item_name[]" value="<?php echo $row['title']; ?>">

                                        <input type="hidden" name="item_price[]" value="<?php echo $row['price']; ?>">
                                        
                                      <tr>
                                            <td>
                                                <img src="assets/MenuItems/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" class="img-thumbnail" width="100px">
                                            </td>
                                          <td><?php echo $row['title']; ?></td>
                                          <td><?php echo $row['price']; ?></td>
                                          <td>
                                              <input type="number" name="quantity[]" class="form-control" style="width: 100px;" min="1" max="10">



                                          </td> 
  
  
  
                                          <td></td>
                                          <td>
                                              <a href="controller/deleteCart_controller.php?cart_id=<?php echo $cart_id; ?>"
                                               class="btn btn-danger rounded-pill" id="dltCartBtn">
                                                  <i class="fa fa-trash"></i>
                                                 
                                                </a>
                                          </td>
                                      </tr>
                                      <?php
                                  }
  
                              }
  
                          }else{
                              ?>
                              <tr>
                                  <td colspan="5" class="text-center">
                                      Your Cart is Empty
                                  </td>
                              </tr>
                              <?php
                          }
  
                          ?>
  
                            <tr>
                              <td colspan="3" class="text-right">Total</td>
                              <td colspan="2">
                                  <span id="total">
  
                              
  
  
                                  </span>
                              </td>
                            </tr>

                            <!-- Table Number -->
                            <tr>

                                <td colspan="3" class="text-right">
                                    Table Number
                                </td>
                                <td colspan="3">
                                   <!-- table number -->

                   <select name="tableNumber" id="tableNumber" class="form-control">
                       <option value="">Select Table Number</option>
                       <option value="t1">Table 1</option>
                       <option value="t2">Table 2</option>
                       <option value="t3">Table 3</option>
                       <option value="t4">Table 4</option>
                       <option value="t5">Table 5</option>
                       <option value="t6">Table 6</option>
                       <option value="t7">Table 7</option>
                       <option value="t8">Table 8</option>
                       <option value="t9">Table 9</option>
                       <option value="t10">Table 10</option>
                     </select>
                  
                                </td>
                    
                            </tr>

                            <!-- Select Method -->

                            <tr>
                                <td colspan="3" class="text-right">
                                Payment Method
                                </td>
                                <td colspan="3">
                                    <select name="method" id="method" class="form-control" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="Cash" >Cash</option>
                                        <!-- <option value="Card">Card</option>
                                        <option value="Paypal">Paypal</option> -->
                                      </select>
                                </td>
                            </tr>

                           

                                <tr>
                                    <td colspan="6" class="text-right">
                                        <button type="submit" class="btn btn-success rounded-pill" id="chkOutBtn">
                                            <i class="fa fa-check"></i>
                                            Confirm Order
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

              </div>

                
       </div>

      </section>

</main>

<script>






    $(document).ready(function(){

        alert('You are requested to enter items quantity');


        // calculate subtotal based on quantity[] and price[]

        $('input[name="quantity[]"]').on('keyup', function(){

            var quantity = $(this).val();

            var price = $(this).closest('tr').find('td:eq(2)').text();

            var subtotal = quantity * price;

            $(this).closest('tr').find('td:eq(4)').text(subtotal);


            // create a hidden qty input field array to store quantity for each item


             $(this).closest('tr').find('td:eq(4)').append('<input type="hidden" name="item_quantity[]" value="'+quantity+'">');

            

             



            // calculate total

            var total = 0;

            $('input[name="quantity[]"]').each(function(){
                var quantity = $(this).val();
                var price = $(this).closest('tr').find('td:eq(2)').text();
                var subtotal = quantity * price;
                total += subtotal;
            });

            $('#total').text(total);

            // create a hidden input field to store total

            // $('#total').append('<input type="hidden" name="total" value="'+total+'">');
        });   


    
       
    });

     


    // confirm order using ajax 

    

    $('#checkOutForm').on('submit', function(e){
        e.preventDefault();

        var total = $('#total').text();

if(total == 0 || total == ''){
    alert('Quantity is required');
} 

else if($('#tableNumber').val() == ''){
    alert('Table Number is required');
}



else{

    $.ajax({
        url: 'controller/confirmOrder_controller.php',
        method: 'POST',
        data: $(this).serialize(),
        beforeSend: function(){
            $('#chkOutBtn').attr('disabled', 'disabled');
            $('#chkOutBtn').html('<i class="fa fa-spinner fa-spin"></i> Processing...');
        },
        success: function(data){
            if(data == 'success'){
                alert('Your Order has been placed successfully');
                window.location.href = '?p=my-orders';
            }else{
                alert(data);
            }
        },
        error: function(err){
            alert(err);
        },
        complete: function(){
            $('#chkOutBtn').removeAttr('disabled');
            $('#chkOutBtn').html('<i class="fa fa-check"></i> Confirm Order');
        }
    });
}
    
    });
    

    

</script>

