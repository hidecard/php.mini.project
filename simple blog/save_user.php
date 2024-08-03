<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "User registered successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
