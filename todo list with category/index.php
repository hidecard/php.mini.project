<?php
$conn = mysqli_connect("localhost", "root", "", "todo_list");
$categories_result = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <a href="add_todo.php">Add New To-Do</a>
    <a href="add_category.php">Add New Category</a>
    <?php while ($category = mysqli_fetch_assoc($categories_result)): ?>
        <h2><?= htmlspecialchars($category['name']) ?></h2>
        <ul>
            <?php
            $todos_result = mysqli_query($conn, "SELECT * FROM todos WHERE category_id='" . $category['id'] . "'");
            while ($todo = mysqli_fetch_assoc($todos_result)): ?>
                <li><?= htmlspecialchars($todo['todo']) ?> (Created at: <?= $todo['created_at'] ?>)</li>
            <?php endwhile; ?>
        </ul>
    <?php endwhile; ?>
</body>
</html>
