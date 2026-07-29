<?php
include "connection.php";

$id_login = $_POST['id_login'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "UPDATE login SET username = '$username', password = '$password' WHERE id_login = '$id_login'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_login.php");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>