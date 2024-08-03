<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h1>Add Category</h1>
    <form action="save_category.php" method="POST">
        <label for="name">Category Name:</label>
        <input type="text" name="name" required><br>
        <button type="submit">Add Category</button>
    </form>
</body>
</html>
