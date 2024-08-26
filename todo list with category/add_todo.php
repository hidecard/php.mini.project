<!DOCTYPE html>
<html>
<head>
    <title>Add To-Do-List</title>
</head>
<body>
    <h1>Add To-Do</h1>
    <form action="save_todo.php" method="POST">
        <label for="category">Category:</label>
        <select name="category_id" required>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "todo_list");
            $categories_result = mysqli_query($conn, "SELECT * FROM categories");
            while ($category = mysqli_fetch_assoc($categories_result)) {
                echo "<option value='{$category['id']}'>{$category['name']}</option>";
            }
            mysqli_close($conn);
            ?>
        </select><br>
        <label for="todo">To-Do:</label>
        <input type="text" name="todo" required><br>
        <button type="submit">Add To-Do</button>
    </form>
</body>
</html>
