<?php
session_start();
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Cek username dan password ke tabel database
$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$login = mysqli_query($koneksi, $query);
$cek   = mysqli_num_rows($login);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status']   = "login";

    // Berhasil login -> Arahkan ke tabel_login.php
    header("Location: tabel_login.php");
    exit;
} else {
    // Gagal login -> Kembali ke login.php
    header("Location: login.php?pesan=gagal");
    exit;
}
?>