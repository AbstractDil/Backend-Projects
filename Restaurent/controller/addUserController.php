<?php

// allow access to this file from ajax request and disable direct access

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

// set timezone to Asia/Kolkata

date_default_timezone_set('Asia/Kolkata');



sleep(3);

// Prevent SQL Injection

function safe_sql($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// echo "Sign Up Form Controller <br>";

// get data from ajaz request

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname = safe_sql($_POST["fname"]);
    $uemail = safe_sql($_POST["uemail"]);
    $pwd = safe_sql($_POST["pwd"]);
    
    $cpwd = safe_sql($_POST["cpwd"]);
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

    if($pwd == $cpwd){

        

        $check = "SELECT * from user_tbl where uemail = '$uemail'";
        $result = mysqli_query($conn,$check);
        $count = mysqli_num_rows($result);

        $pwd = md5($pwd);
      

      if(!($count) == 1){



        $sql = "INSERT INTO `user_tbl` (`datetime`,`fname`, `uemail`, `pwd`) VALUES ('{$datetime}','{$fname}', '{$uemail}', '{$pwd}')";
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
        echo "Email already exists.";
    }
       
        
    }
    else{
        echo "Password and confirm password should be same.";
    }

    
}

else{
    echo "Invalid request. Please try again later.";
}

    




?>