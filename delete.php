<?php 
include "db.php"; 
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "DELETE FROM `product` WHERE `id`='$ID'";
     $result = $conn->query($sql);
     if ($result == TRUE) {
        echo "Record deleted successfully.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 
?>