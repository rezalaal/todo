<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        table, td , th  {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        @session_start();
        
    ?>
   <div id="container">
        <header>
            <ul>
                <?php if (!$_SESSION['isLogin']) { ?>
                    <li><a href="register-form.php">SignUp</a></li>
                    <li><a href="login-form.php">Login</a></li>
                <?php }else{ ?>
                    <li> <?= $_SESSION['user']; ?> </li>
                    <li><a href="logout.php">Log Out </a></li>
                <?php  } ?>

            </ul>
        </header>

        <div id="tasks">
            <h1>All Tasks</h1>
            <span class="error">
                <?php
                    echo $_GET['error'];
                ?>
            </span>
            <form action="add-new-task.php" method="POST">
                <input type="text" name="task" id="add" placeholder="Enter new task">
                <input type="submit" value="ADD">
            </form>

            <?php
                include 'show-all-tasks.php' ?>
        </div>
   </div>
</body>
</html>