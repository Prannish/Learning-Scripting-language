<?php
session_start();

include("../connection.php");

include("../session_check.php");
if (isset($_GET['deleted'])) {
    echo "Item has been deleted";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="container">
    <h1>List of category</h1>
    <a class="btn btn-info text-white" href="insert.php">Insert category</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $sql ="select * from category";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $catid=$row["id"];
            $catname=$row["category_name"];
            echo "
                <tr>
                <th scope='row'> $catid</th>
                <td> $catname</td>
                <td>
                <a href='update.php?id=$catid' class='btn btn-info'/>Update</a>
                <a href='delete.php?id=$catid' class='btn btn-danger'>Delete</a>
                </td>
                </tr> 
            ";

        }
    }

    ?>

        </tbody>
    </table>
    </table>

<a class="btn btn-info text-white" href="../dashboard.php">Go back to DashBoard</a>
</body>

</html>