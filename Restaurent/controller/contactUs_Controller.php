<?php

// allow access to this file from ajax request and disable direct access

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

// set timezone to Asia/Kolkata

date_default_timezone_set('Asia/Kolkata');



sleep(3);

function safe_sql($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// echo "Sign Up Form Controller <br>";

// get data from ajaz request

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname =safe_sql($_POST["fname"]);
    $uemail =safe_sql($_POST["uemail"]);
    $subject =safe_sql($_POST["subject"]);
    
    $msg = safe_sql($_POST["msg"]);
    $datetime = date("Y-m-d H:i:s");
    /*

    echo $fname;
    echo "<br>"; 
    echo $uemail;
    echo "<br>"; 

    echo $pwd;
    echo "<br>"; 

    echo $cpwd;
    echo "<br>"; 
    */

   include('../config/database.php');

   



        $sql = "INSERT INTO `contact_form_data_tble` (`datetime`,`fname`, `uemail`, `subject`,`msg`) VALUES ('{$datetime}','{$fname}', '{$uemail}', '{$subject}','{$msg}')";
        /*
        echo $sql;
        echo "<br>";
        */
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