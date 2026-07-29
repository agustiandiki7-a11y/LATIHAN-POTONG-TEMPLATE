<?php
// 1. Memulai session untuk menyimpan status login
session_start();

// 2. Memanggil koneksi database
include "connection.php";

// 3. Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// 4. Mencegah SQL Injection
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// 5. Query mengecek data ke tabel 'loginn'
$query = mysqli_query($koneksi, "SELECT * FROM loginn WHERE username = '$username' AND password = '$password'");
$cek   = mysqli_num_rows($query);

// 6. Validasi jika data ditemukan
if ($cek > 0) {
    $data = mysqli_fetch_object($query);

    // Simpan data user ke session
    $_SESSION['id_login'] = $data->id_login;
    $_SESSION['username'] = $data->username;
    $_SESSION['status']   = "login";

    // Redirect ke halaman utama / tabel skill
    header("Location: tabel_skill.php");
    exit();
} else {
    // Redirect kembali ke login.php jika gagal
    header("Location: login.php?pesan=gagal");
    exit();
}
?>