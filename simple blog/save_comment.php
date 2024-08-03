<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "blog_system");

$post_id = $_POST['post_id'];
$user_id = $_SESSION['user_id'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (post_id, user_id, comment) VALUES ('$post_id', '$user_id', '$comment')";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
