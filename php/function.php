<?php

$conn = mysqli_connect("localhost", "root", "", "koprasi-testing");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function user($data)
{
    // var_dump($_POST);
    // die;
    global $conn;
    $id = uniqid();
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $password2 = $data["password2"];
    if ($password != $password2) {

        header('Location : register.php');
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES 
    ('$id','$username','$email','$password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id ='$id'");

    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $username = $data["username"];
    $email = $data["email"];
    $password = $data["password"];
    $password2 = $data["password2"];
    if ($password == $password2) {
        $query = "UPDATE user SET
                username ='$username',
                email = '$email',
                password = '$password'
                WHERE id = '$id'";
    } else {
        return false;
    }
    return mysqli_query($conn, $query);
}
function register($data)
{
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah ada '); 
                document.location.href='register.php';          
         </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai !');
                document.location.href='register.php';      
         </script>";

        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$email','$password')");

    return mysqli_affected_rows($conn);
}
