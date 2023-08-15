<?php

// direct access to this file is not allowed

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
    die("Direct access not allowed.");
}

sleep(2);

// Slider Image Controller

// set default timezone to Asia/Calcutta

date_default_timezone_set('Asia/Calcutta');

// Prevent SQL Injection

function safe_sql($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 include('../config/database.php');

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $title = safe_sql($_POST['title']);
   // $price = safe_sql($_POST['price']);
   // $category = safe_sql($_POST['category']);
   // $rating = safe_sql($_POST['rating']);
    $datetime  = date("Y-m-d H:i:s");

    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO `sliders_tbl` (`title`,`image`,`datetime`) VALUES ('$title', '$image','$datetime')";

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