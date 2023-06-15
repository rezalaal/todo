<html>
    <head></head>

    <body>
        <?php
            $isLogin = True;
            echo gettype($isLogin);
            echo "<br>";
            $name = "Ali";
            echo gettype($name);
            echo "<br>";
            $age = 23;
            echo gettype($age);

            var_dump($name);
        ?>
    </body>
</html>