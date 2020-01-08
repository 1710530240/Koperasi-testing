<?php
session_start();
require "function.php";
// if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
//     $id = $_COOKIE["id"];
//     $key = $_COOKIE["key"];

//     $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");

//     $simpan = mysqli_fetch_assoc($result);

//     if ($key === hash("sha256", $simpan["username"])) {
//         $_SESSION["login"] == true;
//     }
// }
if (isset($_SESSION["login"])) {
    header("location = index.php");
    exit;
}
if (isset($_POST["save"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");

    if (mysqli_num_rows($result) === 1) {

        $simpan = mysqli_fetch_assoc($result);

        if (password_verify($password, $simpan["password"])) {

            $_SESSION["login"] = true;

            if (isset($_POST["remember"])) {
                setcookie("id", $simpan["id"], time() + 3600);
                setcookie("key", hash("sha256", $simpan["username"]), time() + 3600);
            }
            header("location: index.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="/Koperasi-testing/img/testing.jpg" width="206%" height="100%" alt="aroo"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome My Koprasi</h1>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username ">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <?php
                                        if (isset($error)) : ?>
                                            <p style="color:red; font-style: italic;">username/password salah </p>

                                        <?php endif; ?>
                                        <div class="form-group btn-primary btn-block btn-user">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label name="remember" class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a> <button name="save" href="index.php" class="btn btn-primary btn-user btn-block">
                                                Login
                                        </a></button>
                                        <div class="text-center btn-google btn btn-google btn-block">
                                            <a class="small btn-google" href="register.php">Create an Account!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../asset/js/sb-admin-2.min.js"></script>

</body>

</html>