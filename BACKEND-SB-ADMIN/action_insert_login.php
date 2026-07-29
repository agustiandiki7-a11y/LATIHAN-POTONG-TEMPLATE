<?php
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_login.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>