<?php
    if (!isset($_SESSION['name'])) {
        header("location: signup.php");
    }
?>