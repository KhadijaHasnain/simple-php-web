<?php 
include "db.php";
  if (isset($_GET['submit'])) {
    $name = $_GET['Name'];
    $description = $_GET['Description'];
    $price = $_GET['Price'];
    $sql = "INSERT INTO `product`(`Name`, `Description`, `Price`) VALUES ('$name','$description','$price')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record created successfully.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
    $conn->close(); 
  }
?>