<?php



    $cart_id = $_GET['cart_id'];

    include('../config/database.php');

    $sql = "DELETE FROM `cart_tbl` WHERE `id` =  '$cart_id'";

   // echo $sql;



    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('Item Removed From Cart.')</script>";
        echo "<script>window.location.href = '../?p=cart';</script>";
    }else{
        echo "<script>alert('Error Occured.')</script>";
        echo "<script>window.location.href = '../?p=cart';</script>";
    }
    


?>