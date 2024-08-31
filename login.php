<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
     <form action="login_action.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="username"><br>
        <label>User Email</label>
        <input type="email" name="email"><br>
        <label>Password</label>
        <input type="password" name="password"><br> 
        <button type="submit">Login</button>
     </form>
</body>
</html>