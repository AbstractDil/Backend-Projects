<?php



    $order_id = $_GET['order_id'];

    include('../config/database.php');

    $sql = "DELETE FROM `order_tbl` WHERE `id` =  '$order_id'";

   // echo $sql;



    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('Your Order Has Been Cancelled.')</script>";
        echo "<script>window.location.href = '../?p=my-orders';</script>";
    }else{
        echo "<script>alert('Error Occured.')</script>";
        echo "<script>window.location.href = '../?p=my-orders';</script>";
    }
    


?>