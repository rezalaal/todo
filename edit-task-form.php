<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task</title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    // Validation 
    if(empty($id)) {
        header("Location: index.php?error=You should select an item.");
        exit();
    }

    $pdo = new PDO('sqlite:mydatabase.db');

    // Construct the INSERT statement
    $sql = "SELECT * FROM tasks WHERE id = :id";

    // Prepare the query
    $stmt = $pdo->prepare($sql);

    // Bind the actual values to the named placeholders
    $stmt->bindParam(':id', $id);


    // Execute the statement
    $stmt->execute();

    $item = $stmt->fetch();
    ?>
    <div id="container">
        <form action="edit-task.php" method="POST">
            <input type="text" name="task" value="<?php echo $item['task'];?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" value="Edit">
            <button onclick="javascript:window.href('/index.php')">Back to home</button>
        </form>
    </div>
</body>
</html>