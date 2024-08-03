<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: register.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$expenses_result = mysqli_query($conn, "SELECT expenses.*, categories.name as category_name FROM expenses JOIN categories ON expenses.category_id = categories.id WHERE user_id='$user_id' ORDER BY date DESC");

// Calculate the total amount of expenses
$total_result = mysqli_query($conn, "SELECT SUM(amount) as total_amount FROM expenses WHERE user_id='$user_id'");
$total_row = mysqli_fetch_assoc($total_result);
$total_amount = $total_row['total_amount'] ? $total_row['total_amount'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
</head>
<body>
    <h1>Expense Tracker</h1>
    <a href="add_expense.php">Add New Expense</a> | <a href="add_category.php">Add New Category</a> | <a href="logout.php">Logout</a>
    <h2>Your Expenses</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Description</th>
        </tr>
        <?php while ($expense = mysqli_fetch_assoc($expenses_result)): ?>
        <tr>
            <td><?= htmlspecialchars($expense['date']) ?></td>
            <td><?= htmlspecialchars($expense['category_name']) ?></td>
            <td><?= htmlspecialchars($expense['amount']) ?> MMK</td>
            <td><?= htmlspecialchars($expense['description']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <h3>Total Amount: <?= number_format($total_amount, 2) ?> MMK</h3>
</body>
</html>
