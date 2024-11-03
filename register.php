<!DOCTYPE html>
<html lang="en">

<head>

<?php 

include "includes/config.php";
ob_start();
session_start();

if(isset($_POST["register"]))
{
    $F_name = $_POST["F_name"];
    $L_name = $_POST["L_name"];
    $emailuser = $_POST["useremail"];
    $pwuser1 = $_POST["pass1"];
    $pwuser2 = $_POST["pass2"];

    // Hash the password for security
    $hashedPassword = password_hash($pwuser1, PASSWORD_DEFAULT);

    $sql_register = "INSERT INTO users (first_name, last_name, email, password, dibuat) 
                    VALUES ('$F_name', '$L_name', '$emailuser', '$hashedPassword', CURRENT_TIMESTAMP)";

    if(mysqli_query($connection, $sql_register))
    {
        // Registration successful, you can redirect the user or do additional actions
        header("location:login.php");
    }
    else
    {
        // Registration failed, handle the error (you might want to show an error message)
        echo "Error: " . mysqli_error($connection);
    }
} 

?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="background">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7 bg-info">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="F_name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" require>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="L_name"  class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="useremail"  class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="pass1" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="pass2" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <a href="login.php" name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-light" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small text-light" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- <script>
        document.querySelector('.bg-register-image').style.backgroundImage = "url('images/regs.jpg')";
    </script> -->

    <script>
        document.querySelector('.background').style.backgroundImage = "url('images/bg.jpg')";
    </script> -->

</body>

</html>