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
    <title>Add Post</title>
</head>
<body>
    <h1>Add Post</h1>
    <form action="save_post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea><br>
        <button type="submit">Add Post</button>
    </form>
</body>
</html>
