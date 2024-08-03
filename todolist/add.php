<?php
include 'db.php';

$task = $_POST['task'];
$task = mysqli_real_escape_string($conn, $task);
$sql = "INSERT INTO todos (task, status) VALUES ('$task', 0)";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>