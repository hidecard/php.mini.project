<?php
include 'db.php';

$sql = "SELECT * FROM todos";
$result = mysqli_query($conn, $sql);
$todos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add.php" method="POST">
        <input type="text" name="task" required>
        <button type="submit">Add</button>
    </form>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <?= htmlspecialchars($todo['task']) ?>
                <?php if (!$todo['status']): ?>
                    <form action="complete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                        <button type="submit">Complete</button>
                    </form>
                <?php endif; ?>
                <form action="delete.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
