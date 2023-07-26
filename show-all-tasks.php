<?php
$pdo = new PDO('sqlite:mydatabase.db');
// Construct the INSERT statement
$sql = "SELECT * FROM tasks ORDER BY id DESC";
// Prepare the query
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$row = 1;
?>
<table>
    <tr>
        <th>code</th>
        <th>task title</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
    <?php
    foreach($result as $item) {
    ?>
    <tr>
        <td><?php echo $row; ?></td>
        <td><?php echo $item['task']; ?></td>
        <td><a href="edit-task-form.php?id=<?php echo $item['id']; ?>">edit</a></td>
        <td><a href="delete-task.php?id=<?php echo $item['id']; ?>">delete</a></td>
    </tr>
    <?php
    $row++;
    }
    ?>
</table>