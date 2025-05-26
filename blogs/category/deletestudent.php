<?php
        session_start();

    include("../connection.php");

    include("../session_check.php");
    $id = $_GET['id'];
    $sql = "delete from student where id=$id";

    $result = mysqli_query($conn, $sql); // returns True if data is inserted
    if ($result) {
      header('Location: viewstudent.php?deleted=true');
    }
?>