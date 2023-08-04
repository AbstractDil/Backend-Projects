<?php


// allow access to this file from ajax request and disable direct access

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}



// delete user from database using ajax

include ('../config/database.php');

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $sql = "DELETE FROM menu_items_tbl WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo 'success';
    }
    else{
        echo 'error';
    }

}


?>