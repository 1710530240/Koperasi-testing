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
    $passwaord = $data["password"];
    $passwaord2 = $data["password2"];
    if ($passwaord != $passwaord2) {

        header('Location : register.php');
    }
    $passwaord = password_hash($passwaord, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES 
    ('$id','$username','$email','$passwaord')";

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
    $passwaord = $data["password"];
    $passwaord2 = $data["password2"];
    if ($passwaord == $passwaord2) {
        $query = "UPDATE user SET
                username ='$username',
                email = '$email',
                password = '$passwaord'
                WHERE id = '$id'";
    } else {
        return false;
    }
    return mysqli_query($conn, $query);
}
