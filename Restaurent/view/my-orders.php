<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h3 class="jumbotron-text display-4">
                <i class="fa fa-shopping-cart"></i>
                My Orders
            </h3>


        </div>

    </section>



    <section class="container">

        <div class="row">



            <div class="col-md-10 offset-md-1">
                

                <div class="card mb-5">

                    <div class="card-header">
                        My Orders
                    </div>

                    <div class="card-body table-responsive">

                        <!-- Print Bill -->

                        <a href="javascript:void(0);" onclick="printBill();"
                            class="btn btn-primary btn-sm rounded-pill mb-2 float-right d-print-none">
                            <i class="fa fa-print"></i>
                            Print Bill
                        </a>

                        <table class="table table-hover table-bordered" id="myOrdersTbl">

                            <thead>
                                <tr role="row">
                                    <th colspan="9" class="text-center">
                                        <h6>
                                            <i class="fa fa-shopping-cart"></i>
                                            My Orders
                                        </h6>
                                    </th>

                                </tr>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>
                                        Sub Total
                                    </th>
                                    <th>Method</th>
                                    <th>Table No</th>
                                    <th>Status</th>
                                    <th class="d-print-none">
                                        Action
                                    </th>
                                </tr>



                            </thead>

                            <tbody>

                                <?php

                $user_id = $_SESSION['uid'];

                $sql = "SELECT * FROM `order_tbl` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";

                //echo $sql;

                $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result) > 0){

                    while($row = mysqli_fetch_assoc($result)){

                        ?>

                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['item_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['quantity']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php
                                $sub_total = $row['quantity'] * $row['price'];
                                echo $sub_total;
                                ?>
                                    </td>
                                    <td>
                                        <?php echo $row['method']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['table_no']; ?>
                                    </td>
                                    <td>
                                        <?php
                                if($row['status'] == 0){
                                    echo "<span class='badge badge-warning'>Pending</span>";
                                }elseif($row['status'] == 1){
                                    echo "<span class='badge badge-info'>Accepted</span>";
                                }elseif($row['status'] == 2){
                                    echo "<span class='badge badge-success'>Delievered</span>";
                                }elseif($row['status'] == 3){
                                    echo "<span class='badge badge-danger'>Cancelled</span>";
                                }
                                ?>
                                    </td>

                                    <td class="d-print-none">
                                        <a href="controller/cancelOrder_controller.php?order_id=<?php echo $row['id'];?>"
                                            class="btn btn-danger btn-sm rounded-circle d-print-none">
                                            <i class="fa fa-times"></i>
                                        </a>



                                    </td>

                                </tr>






                                <?php
                    }

                }else{
                    echo "<tr><td colspan='9' class='text-center'>No Orders Found.</td></tr>";
                }

                ?>



                                <tr>
                                    <td colspan="7" class="text-left">
                                        <a href="?p=home" class="btn btn-info d-print-none">
                                            <i class="fa fa-shopping-cart"></i>
                                            Continue Shopping
                                        </a>
                                    </td>

                                    <?php
                     
                     // calculate total using subtotal

                     $sql = "SELECT SUM(`quantity` * `price`) AS `total` FROM `order_tbl` WHERE `user_id` = '$user_id'";

                     $result = mysqli_query($conn,$sql);

                     $row = mysqli_fetch_assoc($result);

                     $total = $row['total'];

                     echo "<td colspan='7' class='text-right font-weight-bold text-primary'>Total: $total</td>";


                 ?>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
    </section>
</main>

<script>
    function printBill() {
        var printContents = document.getElementById("myOrdersTbl").innerHTML;
        var originalContents = document.body.innerHTML;

        // display print in table format

        document.body.innerHTML = "<html><head><title></title></head><body><h3 class='jumbotron-text display-4'><i class='fa fa-shopping-cart'></i> My Orders</h3><table class='table table-hover table-bordered'>" + printContents + "</table></body></html>";

        window.print();

        document.body.innerHTML = originalContents;

        window.location.href = "?p=my-orders";




    }
</script>