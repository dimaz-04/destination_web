<!DOCTYPE html>
<html lang="en">

<head>

<?php 

include "includes/config.php";
ob_start();
session_start();

if(isset($_POST["submitlogin"]))
{
    $emailuser = $_POST["useremail"];
    $pwuser = $_POST["pass"];
    $sql_login = mysqli_query($connection, " SELECT * FROM admin 
    WHERE admin_EMAIL = '$emailuser' AND admin_PASSWORD = '$pwuser' ");

    if(mysqli_num_rows($sql_login) > 0)
    {
        $row_admin = mysqli_fetch_array($sql_login);
        $_SESSION['kodeuser'] = $row_admin['admin_ID'];
        $_SESSION['emailuser'] = $row_admin['admin_EMAIL'];
        header("location:index.php");
    }
} 

?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- <link rel="stylesheet" href="style.css"> -->

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6 bg-info">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="useremail" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label text-light" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                        <!-- 
                                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                         -->

                                        <input type="submit" name="submitlogin" class="btn btn-primary btn-user btn-block" value="login">
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-light" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-light" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
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
        document.querySelector('.bg-login-image').style.backgroundImage = "url('images/login.jpg')";
    </script> -->

    <script>
        document.querySelector('.background').style.backgroundImage = "url('images/bg.jpg')";
    </script> -->

</body>

<?php

mysqli_close($connection);
ob_end_flush();

?>

</html>