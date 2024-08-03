<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "blog_system");

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$content = $_POST['content'];

// Prepared statement to insert post
$stmt = $conn->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $title, $content);

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
