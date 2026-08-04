<?php
// 1. Memulai session untuk menyimpan status login
session_start();

// 2. Memanggil koneksi database
include "connection.php";

// 3. Mengambil data dari form login dengan pengecekan isset agar tidak error undefined key
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Jika form dikosongkan/diakses langsung, kembalikan ke halaman login
if (empty($email) || empty($password)) {
    header("Location: login.php?pesan=kosong");
    exit();
}

// 4. Mencegah SQL Injection
$email = mysqli_real_escape_string($koneksi, $email);
$password = mysqli_real_escape_string($koneksi, $password);

// 5. Query mengecek data ke tabel (Diubah dari 'loginn' menjadi 'login')
$query = mysqli_query($koneksi, "SELECT * FROM login WHERE email = '$email' AND password = '$password'");

if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
}

$cek = mysqli_num_rows($query);

// 6. Validasi jika data ditemukan
if ($cek > 0) {
    $data = mysqli_fetch_object($query);

    // Simpan data user ke session
    $_SESSION['id_login'] = $data->id_login;
    $_SESSION['email'] = $data->email;
    $_SESSION['status'] = "login";

    // Redirect ke halaman utama / tabel skill
    header("Location: tabel_skill.php");
    exit();
} else {
    // Redirect kembali ke login.php jika gagal
    header("Location: login.php?pesan=gagal");
    exit();
}
?>