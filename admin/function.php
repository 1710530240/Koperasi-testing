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
    $gambar = $data["foto"];
    $passwaord = $data["password"];
    $passwaord2 = $data["password2"];
    $photoPropil = 'foto';

    if ($passwaord != $passwaord2) {

        header('Location : register.php');
    }
    $passwaord = password_hash($passwaord, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES 
    ('$id','$username','$email','$gambar','$passwaord','$photoPropil')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
