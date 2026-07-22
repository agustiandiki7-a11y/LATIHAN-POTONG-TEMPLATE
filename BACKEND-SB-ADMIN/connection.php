<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "profile-cv";

$koneksi = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>