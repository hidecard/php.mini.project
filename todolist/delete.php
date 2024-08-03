<?php

include 'db.php';

$id = $_POST['id'];
$id = mysqli_real_escape_string($conn, $id);
$sql = "DELETE FROM todos WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
