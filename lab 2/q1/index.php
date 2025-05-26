<?php
include 'config.php';

// Insert Data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header("Location: index.php"); // Redirect to refresh the page
    exit(); // Ensure script stops executing after redirection
}

// Delete Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
}

// Fetch Data
$result = $conn->query("SELECT * FROM users");

// Fetch Data for Editing
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = $edit_result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD App</title>
</head>
<body>
    <h2>PHP CRUD Application</h2>

    <!-- Insert & Update Form -->
    <form method="post">
        <span>Insert data:</span>
        <input type="hidden" name="id" value="<?= isset($row) ? $row['id'] : '' ?>">
        <input type="text" name="name" placeholder="Enter Name" value="<?= isset($row) ? $row['name'] : '' ?>" required>
        <input type="email" name="email" placeholder="Enter Email" value="<?= isset($row) ? $row['email'] : '' ?>" required>
        <button type="submit" name="<?= isset($row) ? 'update' : 'submit' ?>">
            <?= isset($row) ? 'Update' : 'Submit' ?>
        </button>
    </form>
<br>
    <!-- Display Data -->
    <h3>Inserted data:</h3>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
