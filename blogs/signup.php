<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <?php
    $enteredName = "";
    $enteredEmail = "";
    $enteredPassword = "";
    $enteredCPassword = "";
    $errorN = "";
    $errorE = "";
    $errorP = "";
    $errorCP = "";
    $hasError = false;
    $dbError = "";


     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $enteredName = $_POST['name'];
        $enteredEmail = $_POST['email'];
        $enteredPassword = $_POST['password'];
        $enteredCPassword = $_POST['confirmpassword'];

        if($enteredName == ""){
            $errorN =  "Enter Valid name";
            $hasError = true;
        }
        
        if($enteredEmail == ""){
            $errorE =  "Enter Valid Email";
            $hasError = true;
        }
        if($enteredPassword == ""){
            $errorP =  "Enter Valid Password";
            $hasError = true;
        }
        if($enteredCPassword == ""){
            $errorCP =  "Enter Valid Confirm Password";
            $hasError = true;
        }

        if(!$hasError){
            // echo "You can now save the data to server";
            $check = "select * from users where email='$enteredEmail'";  // 
            $res = mysqli_query($conn, $check); // execute mysql query
            if (mysqli_num_rows($res) > 0) { // return int
            // d - if already exists : Email ALready exist
              $dbError = "Email Already Exists";
            } else {
              $dbError = "";
            // e - if not save data in table : id,name, email,password
              $hashedPassword = password_hash($enteredPassword, PASSWORD_DEFAULT);
                $sql = "insert into users(name,email,password) values('$enteredName','$enteredEmail','$hashedPassword')";
        
              $result = mysqli_query($conn, $sql); // returns True if data is inserted
              if ($result) {
               // f - Redirect user on login page
                header('Location: login.php');
              }
            // }
        
        }
    }
    }

    ?>
    

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Blogs</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html"
                >Home</a
              >
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
        <form class="w-50 border border-1 p-3 ms-4" method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <h4 class="text-center">Signup</h1>

                <div class="mb-3">
                    <label class="form-label">Full Name</label> 
                    <span class="text-danger"><?php  echo $errorN; ?></span>
                    <input name="name" value="<?php echo $enteredName; ?>" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <span class="text-danger"><?php  echo $errorE; ?></span>
                    <input name="email" value="<?php echo $enteredEmail; ?>" type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label> <span class="text-danger"><?php  echo $errorP; ?></span>
                    <input name="password" type="password" value="<?php echo $enteredPassword; ?>" class="form-control"
                        id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label> <span class="text-danger">
                        <?php  echo $errorCP; ?></span>
                    <input name="confirmpassword" value="<?php echo $enteredCPassword; ?>" type="password"
                        class="form-control">
                </div>
                <p></p>
                <button type="submit" class="btn btn-primary">Signup</button>
                

        </form>
    </div>


</body>

</html>