<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "blog_system");
$posts_result = mysqli_query($conn, "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog - Home</title>
</head>
<body>
    <h1>Blog</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="add_post.php">Add New Post</a> | <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a> | <a href="register.php">Register</a>
    <?php endif; ?>
    <?php while ($post = mysqli_fetch_assoc($posts_result)): ?>
        <h2><?= htmlspecialchars($post['title']) ?> by <?= htmlspecialchars($post['username']) ?></h2>
        <p><?= htmlspecialchars($post['content']) ?></p>
        <p>Created at: <?= $post['created_at'] ?></p>
        <h3>Comments:</h3>
        <ul>
            <?php
            $comments_result = mysqli_query($conn, "SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE post_id='" . $post['id'] . "' ORDER BY created_at DESC");
            while ($comment = mysqli_fetch_assoc($comments_result)): ?>
                <li><?= htmlspecialchars($comment['comment']) ?> by <?= htmlspecialchars($comment['username']) ?> at <?= $comment['created_at'] ?></li>
            <?php endwhile; ?>
        </ul>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="save_comment.php" method="POST">
                <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                <textarea name="comment" required></textarea><br>
                <button type="submit">Add Comment</button>
            </form>
        <?php endif; ?>
    <?php endwhile; ?>
</body>
</html>
