<?php 
include "db.php";
if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
?>
