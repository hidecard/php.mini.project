<?php
$conn = mysqli_connect("localhost", "root", "", "todo_list");

$category_id = $_POST['category_id'];
$todo = $_POST['todo'];

$sql = "INSERT INTO todos (category_id, todo) VALUES ('$category_id', '$todo')";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
