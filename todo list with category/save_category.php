<?php
$conn = mysqli_connect("localhost", "root", "", "todo_list");

$name = $_POST['name'];

$sql = "INSERT INTO categories (name) VALUES ('$name')";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
