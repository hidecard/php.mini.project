<?php
include 'db.php';

$id = $_POST['id'];
$id = mysqli_real_escape_string($conn, $id);
$sql = "UPDATE todos SET status = 1 WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
