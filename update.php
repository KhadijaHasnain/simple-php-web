<?php
include "db.php";
if (isset($_POST['update'])) {
    $id = $_GET['id']; 
    $name = $_POST['Name'];
    $description = $_POST['Description']; 
    $price = $_POST['Price']; 

    $sql = "UPDATE `product` SET `Name`='$name', `Description`='$description', `Price`='$price' WHERE `id`='$id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM `product` WHERE `id`='$ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['Name'];
            $description = $row['Description']; 
            $price = $row['Price'];
            $id = $row['ID'];
        }
        ?>
        <h2>User Update Form</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Product information:</legend>
                Name:<br>
                <input type="text" name="Name" value="<?php echo $name; ?>"><br>
                Description:<br>
                <input type="text" name="Description" value="<?php echo $description; ?>"><br> 
                Price:<br>
                <input type="text" name="Price" value="<?php echo $price; ?>"><br>
                <input type="submit" name="update" value="Update">
            </fieldset>
        </form>
        <?php
    } else {
        header('Location: view_product.php');
    }
}
?>