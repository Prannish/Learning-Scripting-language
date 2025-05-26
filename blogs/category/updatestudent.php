<?php
session_start();

include("../connection.php");

include("../session_check.php");


$firstErr = "";
$first = "";
$lastErr = "";
$last = "";
$ageErr = "";
$age = "";
$addressErr = "";
$address = "";
$classErr = "";
$class = "";
$hasError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["first"])){
        $hasError = true;
        $firstErr = "First Name is Required";
    } else {
        $firstErr = "";
        $first = $_POST["first"];
    }
    if(empty($_POST["last"])){
        $hasError = true;
        $lastErr = "Last Name is Required";
    } else {
        $lastErr = "";
        $last = $_POST["last"];
    }
    if(empty($_POST["age"])){
        $hasError = true;
        $ageErr = "Age is Required";
    } else {
        $ageErr = "";
        $age = $_POST["age"];
    }
    if(empty($_POST["address"])){
        $hasError = true;
        $addressErr = "Address is Required";
    } else {
        $addressErr = "";
        $address = $_POST["address"];
    }
    if(empty($_POST["class"])){
        $hasError = true;
        $classErr = "Class is Required";
    } else {
        $classErr = "";
        $class = $_POST["class"];
    }
    if(!$hasError){
        // insert into database
        $sql = "insert into students(first) values('$first')";

        $result = mysqli_query($conn, $sql); // returns True if data is inserted
        if ($result) {
         // f - Redirect user on view
        //   header('Location: view.php?created=true');
          header('Location: view.php');
        //   echo "Item Inserted Successfully ";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="container">


    <h1 class="text-center">Update Students Details</h1>
    <div class="mt-5">


        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $firstErr ?>
        </div>
        <?php endif ?>

        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $lastErr ?>
        </div>
        <?php endif ?>

        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $ageErr ?>
        </div>
        <?php endif ?>

        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $addressErr ?>
        </div>
        <?php endif ?>

        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $classErr ?>
        </div>
        <?php endif ?>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input name="first" type="text" class="form-control" id="exampleInputEmail1">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input name="last" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Age</label>
                <input name="age" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input name="address" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Class</label>
                <input name="class" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <button type="submit" class="btn btn-primary">Update Students Details</button>
        </form>
    </div>

</body>

</html>