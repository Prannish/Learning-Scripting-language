<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
</head>
<body>

<h2>User Information Form</h2>

<form method="POST" action="">
    <label for="name">Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label for="message">Message:</label><br>
    <textarea name="message" rows="5" cols="30" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    echo "<h3>Submitted Data:</h3>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Message: " . nl2br($message) . "<br>";
}
?>

</body>
</html>
