<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- 1 - When users click on Login Button 
        a - If request post
        b - validation
        c - if email not exists throw : Invalid Credentials
        d - if email exists then check password
        e - echo "Login SuccessFul;
        f - navigate to dashboard -->
    <?php
    $enteredEmail = "";
    $enteredPassword = "";
    $errorE = "";
    $errorP = "";
    $hasError = false;
    $dbError = "";

    // a - If request post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteredEmail = $_POST['email'];
        $enteredPassword = $_POST['password'];
        // b - validation
        if ($enteredEmail == "") {
            $errorE = "Enter Valid Email";
            $hasError = true;
        }
        if ($enteredPassword == "") {
            $errorP = "Enter Valid Password";
            $hasError = true;
        }
        // c - if email not exists throw : Invalid Email
        if (!$hasError) {
            $sqlQ = "select * from users where email='$enteredEmail'";
            $res = mysqli_query($conn, $sqlQ);
            if (mysqli_num_rows($res) == 0) {
                $dbError = "Invalid Email";
            } else {
                $row = mysqli_fetch_assoc($res); // fetch data from our table
                $DBhashpassword = $row['password'];
                $decrypt = password_verify($enteredPassword, $DBhashpassword);
                echo $decrypt;
                if ($decrypt) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    header('Location: dashboard.php');
                } else {
                    $dbError = "Invalid Password";
                }
            }
        }
    }

    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Blogs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="vh-100 bg-info pt-3 ps-4">
        <p class="text-danger"><?php echo $dbError ?></p>

        <form class="w-50 border border-1 p-3 ms-4" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <h4 class="text-center">Login</h1>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <span class="text-danger"><?php echo $errorE; ?></span>
                    <input name="email" value="<?php echo $enteredEmail; ?>" type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label> <span class="text-danger"><?php echo $errorP; ?></span>
                    <input name="password" type="password" value="<?php echo $enteredPassword; ?>" class="form-control"
                        id="exampleInputPassword1">
                </div>

                <p></p>
                <button type="submit" class="btn btn-primary">Login</button>
                <span><?php echo $hasError ?></span>
                <p>Don't have an account?<a href="signup.php">Signup</a></p>

        </form>
    </div>


</body>

</html>