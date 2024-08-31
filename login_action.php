<?php 
include "db.php";
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    if (empty($username)) {
        header("Location: login.php?error=User Name is required");
        exit();
    }else if(empty($email)){
        header("Location: login.php?error=email is required");
        exit();
    }else if(empty($pass)){
        header("Location: login.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM login WHERE username='$username' AND email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['email'] === $email && $row['password'] === $pass) {
                echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: login.php?error=Incorrect User name or password");
                exit();
            }
        }else{
            header("Location: login.php?error=Incorrect User name or password");
            exit();
        }
    }
}else{
    header("Location: login.php");
    exit();
}
?>
