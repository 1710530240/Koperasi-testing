<?php
require "function.php";
$id = $_GET["id"];
$kop = query("SELECT * FROM user WHERE id ='$id'")[0];
if (isset($_POST["save"])) {
    $data = $_POST;
    $data['id'] =  $_GET['id'];
    if (ubah($data) == true) {
        echo " 
        <script>
            alert('data berhasil diubah');
            document.location.href='member.php';
       </script>
       ";
    } else {
        echo " 
        <script>
            alert('data gagal diubah');
            document.location.href='member.php';
       </script>
       ";
    }
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

    <title>Register</title>


    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register"><img src="/Koperasi-testing/img/testing.jpg" width="248%" height="100%" alt=""></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group row">
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                    <input required name="username" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="username" value="<?= $kop['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <input required name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" value="<?= $kop['email']; ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="<?= $kop['password']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input required name="password2" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" value="<?= $kop['password']; ?>">
                                    </div>
                                </div>
                                <a> <button type="submit" name="save" class="btn btn-primary btn-user btn-block">
                                        Update Account
                                    </button></a>
                            </form>
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