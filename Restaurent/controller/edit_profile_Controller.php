<?php 


if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}



sleep(3);

// set timezone to Asia/Kolkata

date_default_timezone_set('Asia/Kolkata');

// check if form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $uid = $_POST["uid"];

    $fname = $_POST["fname"];
    $uemail = $_POST["uemail"];
   
    $datetime = date("Y-m-d H:i:s");
 

   include('../config/database.php');

   // update query

    $sql = "UPDATE `user_tbl` SET `fname` = '{$fname}', `uemail` = '{$uemail}', 
    `updated_on` = '{$datetime}' WHERE `user_tbl`.`id` = '{$uid}'";

   // UPDATE `user` SET `fname` = 'Sagar', `uemail` = 'sagar@gmail.com' WHERE `user`.`id` = 25;

    $result = mysqli_query($conn, $sql);

    if($result){

        echo "success";

    }

    else{

        echo "error";

    }

}

else{
    echo "Invalid request. Please try again later.";
}


?>