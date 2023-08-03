<?php

// direct access to this file is not allowed

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

sleep(2);

// Product Add and Upload Image Controller

// set default timezone to Asia/Calcutta

date_default_timezone_set('Asia/Calcutta');

 include('../config/database.php');

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $rating = $_POST['rating'];
    $datetime  = date("Y-m-d H:i:s");

    $target_dir = "../assets/MenuItems/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO `menu_items_tbl` (`title`, `price`, `category`, `image`, `rating`,`datetime`) VALUES ('$title', '$price', '$category', '$image', '$rating','$datetime')";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        echo "success";
       // header('Location: ../index.php?p=dashboard&c=products');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();

 }

?>