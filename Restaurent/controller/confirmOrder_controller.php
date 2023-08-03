<?php

// allow access to this file from ajax request and disable direct access

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}


// set timezone to Asia/Kolkata

date_default_timezone_set('Asia/Kolkata');


if($_SERVER["REQUEST_METHOD"]  == "POST"){

   


     include('../config/database.php');


     for ($i=0; $i < count($_POST['menu_items_id']); $i++) { 

        $datetime = date("Y-m-d H:i:s");


       // echo $_POST['menu_items_id'][$i] . "<br>";
       
    $sql = "INSERT INTO `order_tbl` (`datetime`,`menu_items_id`, `user_id`, `quantity`, `price`, `item_name`, `method`,`table_no`) VALUES ('{$datetime}','{$_POST['menu_items_id'][$i]}', '{$_POST['user_id'][$i]}', '{$_POST['item_quantity'][$i]}', '{$_POST['item_price'][$i]}', '{$_POST['item_name'][$i]}', '{$_POST['method']}','{$_POST['tableNumber']}')";


   // echo $sql . "<br>";

        //print_r($sql);

        $result = mysqli_query($conn,$sql);

       
            
     }

     if($result){
        echo "success";
    
        }else{
        echo "error";
        }
     
/*

   include('../config/database.php');

    $sql = "INSERT INTO `order_tbl` (`datetime`,`menu_items_id`, `user_id`, `quantity`, `price`, `item_name`, `method`,`table_no`) VALUES ('{$data['datetime']}','{$data['item_id']}', '{$data['user_id']}', '{$data['quantity']}', '{$data['price']}', '{$data['title']}', '{$data['method']}','{$data['table_no']}')";

   // print_r($sql);

    $result = mysqli_query($conn,$sql);
   
    
        if($result){
            echo "success";
        
            }else{
            echo "error";
            }
            */
    
            
    }
    else{
        echo "error";

}


?>