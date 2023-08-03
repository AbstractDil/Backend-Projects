<?php

// direct access to this file is not allowed 

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

if($_SERVER["REQUEST_METHOD"]  == "POST"){

    // include database configuration file

    include('../config/database.php');

    // get order id from post request

    $order_id = $_POST['order_id'];

    // get status from post request

    $status = $_POST['status'];

    // update order status in database

    $sql = "UPDATE `order_tbl` SET `status` = '$status' WHERE `id` = '$order_id'";

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "success";
    }else{
        echo "error";
    }

}

?>