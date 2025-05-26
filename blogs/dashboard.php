<?php
session_start();
include("connection.php");
include("session_check.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="vh-100 bg-info pt-3 ps-4">
        <p class="btn-infp text-white">Welcome <?php echo $_SESSION['name']; ?></p>
        <div class="container">
            <h1>Dashboard</h1>
            <a class="btn btn-light text-black" href="category/view.php">View Category</a>
            <a class="btn btn-light text-black" href="category/viewstudent.php">View Students</a>
            
            
        </div>
        <br>
        <p><a class="btn btn-danger text-white" href="index.html">Go back to Home page</a></p>
    </div>

    



</body>

</html>