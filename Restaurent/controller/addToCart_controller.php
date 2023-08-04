
<?php

// add to cart controller

// direct access to this file is not allowed

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

// set timezone to Asia/Kolkata

date_default_timezone_set('Asia/Kolkata');

function safe_sql($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = safe_sql($_POST['menu_items_id']);
    $uid = safe_sql($_POST['uid']);

    // check if item already exists in cart

    $check = "SELECT * from cart_tbl where menu_items_id = '{$id}' and user_id = '{$uid}'";

    $result = mysqli_query($conn, $check);

    $count = mysqli_num_rows($result);

    if (!($count) == 1) {
      
  
    $datetime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `cart_tbl` (`user_id`, `menu_items_id`, `datetime`) VALUES ('{$uid}', '{$id}',  '{$datetime}')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Item added to cart";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
else{
    echo "Item already exists in cart";

}
}

?>