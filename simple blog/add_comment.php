<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$post_id = $_GET['post_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Comment - Blog</title>
</head>
<body>
    <h1>Add Comment</h1>
    <form action="save_comment.php" method="POST">
        <input type="hidden" name="post_id" value="<?= $post_id ?>">
        <label for="comment">Comment:</label>
        <textarea name="comment" required></textarea><br>
        <button type="submit">Add Comment</button>
    </form>
</body>
</html>
