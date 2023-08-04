
<?php

// direct access to this file is not allowed 

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

//sleep(2); // sleep for 2 seconds

// Fetch All Users

include('../config/database.php');

$sql = "SELECT * FROM menu_items_tbl ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$output = [];

if (mysqli_num_rows($result) > 0) {
    

    foreach ($result as $row) {
        array_push($output, $row);
    }


   //header('Content-Type: application/json');
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No Users Found', 'status' => false));
}



?>