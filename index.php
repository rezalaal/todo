<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <?php
        @session_start();
        
       if($_SESSION['isLogin'] == true) {
        echo "is login";
       }else{
        "not logged in";
       }
    ?>
   <div id="container">
        <header>
            <ul>
                <li><a href="register-form.php">SignUp</a></li>
                <li><a href="login-form.php">Login</a></li>
            </ul>
        </header>
   </div>
</body>
</html>