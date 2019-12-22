<?php
session_start();
if (isset($_SESSION["login"])) {
    header("location = login.php");
}
require "function.php";
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo " 
        <script>
            alert('data berhasil dihapus');
            document.location.href='member.php';
       </script>
       ";
} else {
    echo " 
        <script>
            alert('data gagal dihapus');
            document.location.href='member.php';
       </script>
       ";
}
