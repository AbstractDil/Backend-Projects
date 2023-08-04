<?php

// allow access to this file from ajax request and disable direct access

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}



sleep(3);

date_default_timezone_set('Asia/Kolkata');



if($_SERVER["REQUEST_METHOD"]  == "POST"){

    $uemail = $_POST["uemail"];
    $pwd = $_POST["pwd"];

   include('../config/database.php');

$sql = " SELECT * FROM user_tbl WHERE uemail = '{$uemail}'  ";

  $result = mysqli_query($conn,$sql);
  $numrows = mysqli_num_rows($result);

    if($numrows == 1){
    
        $row = mysqli_fetch_assoc($result);

        if($row["usertype"] == 0){
            echo "You are not authorized to login here.";
            exit();
        }


    
        if(md5($pwd) == $row["pwd"]){
    
        session_start();
        $_SESSION["uemail"] = $uemail;
        $_SESSION["fname"] = $row["fname"];
        $_SESSION["uid"] = $row["id"];
        $_SESSION["usertype"] = $row["usertype"];
        $_SESSION["is_login"] = true;
        // set cookie
        setcookie("uemail",$uemail,time() + (86400 * 30),"/");
        setcookie("fname",$row["fname"],time() + (86400 * 30),"/");
        setcookie("uid",$row["id"],time() + (86400 * 30),"/");
        setcookie("is_login",true,time() + (86400 * 30),"/");
        
    
        echo "success";
    
        }else{
        echo "Password is incorrect";
        }

}
else{
    echo "Email does not exist";
}
}


?>