<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "blogs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn == false) {
    // if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>