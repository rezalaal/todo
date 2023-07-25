<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div id="container">
        <form action="register.php" method="POST">
            <label>Username:</label>
            <input type="text" placeholder="Username" name="username" id="username">
            <label>Password:</label>
            <input type="password" placeholder="Password" name="password" id="password">
            <label>Retype Password:</label>
            <input type="password" placeholder="Retype Password" name="confirm-password" id="confirm-password">
            <input type="submit" value="Register" id="submit">
        </form>
        <?php
            $error = $_GET['error'];
            echo $error;
        ?>
    </div>
</body>
</html>