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
    <title>view student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="container">
    <h1>List of Students</h1>
    <a class="btn btn-info text-white" href="insertstudents.php">Insert Student Details</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Classs</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from student";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $first = $row["first"];
                    $last = $row["last"];
                    $age = $row["age"];
                    $address = $row["address"];
                    $class = $row["class"];

                    echo "
                <tr>
                <th scope='row'> $id</th>
                <td> $first</td>
                <td> $last</td>
                <td> $age</td>
                <td> $address</td>
                <td> $class</td>
                <td>
                <a href='updatestudent.php?id=$id' class='btn btn-info'/>Update</a>
                <a href='deletestudent.php?id=$id' class='btn btn-danger'>Delete</a>
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