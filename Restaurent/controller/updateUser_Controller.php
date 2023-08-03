<?php

// direct access to this file is not allowed 
/*
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}
*/


date_default_timezone_set('Asia/Kolkata');


if($_SERVER["REQUEST_METHOD"]  == "POST"){

    // include database configuration file

    
    $uid = $_POST['uid'];
    
    $fname = $_POST['fname'];
    
    $datetime = date("Y-m-d H:i:s");
    
    $uemail = $_POST['uemail'];
    
    include('../config/database.php');
    // update order status in database

    $sql = "UPDATE user_tbl SET fname = '$fname', uemail = '$uemail', updated_on = '$datetime' WHERE id = '$uid'";

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "success";
    }else{
        echo "error";
    }

}

?>