<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Prepared statement to insert expense
    $stmt = $conn->prepare("INSERT INTO expenses (user_id, category_id, amount, description, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $user_id, $category_id, $amount, $description, $date);

    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
</head>
<body>
    <h1>Add Expense</h1>
    <form method="POST" action="add_expense.php">
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <?php
            $categories_result = mysqli_query($conn, "SELECT * FROM categories");
            while ($category = mysqli_fetch_assoc($categories_result)):
            ?>
                <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
            <?php endwhile; ?>
        </select><br>
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="date">Date:</label>
        <input type="date" name="date" required><br>
        <button type="submit">Add Expense</button>
    </form>
</body>
</html>
