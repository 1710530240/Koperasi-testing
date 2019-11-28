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
    global $conn;
    $id = uniqid();
    $username = $data["username"];
    $email = $data["email"];
    $passwaord = $data["password"];
    $passwaord2 = $data["password2"];
    $photoPropil = 'default.jpg';

    $query = "INSERT INTO user VALUES 
    ('$id','$username','$email','$passwaord','$photoPropil')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($query);
}
