<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul profile dan terhubung dengan tabel `profile` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Memastikan halaman diakses melalui metode POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") { 
    header("Location: form_profile.php"); 
    exit; 
}

// Menangkap dan mengamankan data dari form
$nama       = mysqli_real_escape_string($koneksi, $_POST['nama'] ?? '');
$about      = mysqli_real_escape_string($koneksi, $_POST['about'] ?? '');
$website    = mysqli_real_escape_string($koneksi, $_POST['website'] ?? '');
$phone      = mysqli_real_escape_string($koneksi, $_POST['phone'] ?? '');
$email      = mysqli_real_escape_string($koneksi, $_POST['email'] ?? '');
$address    = mysqli_real_escape_string($koneksi, $_POST['address'] ?? '');
$linkedin   = mysqli_real_escape_string($koneksi, $_POST['linkedin'] ?? '');
$nationalty = mysqli_real_escape_string($koneksi, $_POST['nationality'] ?? '');

// Perintah SQL untuk memasukkan data ke tabel profile
$sql = "INSERT INTO profile (nama, about, website, phone, email, address, linkedin, nationalty) 
        VALUES ('$nama', '$about', '$website', '$phone', '$email', '$address', '$linkedin', '$nationalty')";

// Menjalankan perintah SQL menggunakan koneksi database yang tersimpan pada variabel $koneksi.
if (!mysqli_query($koneksi, $sql)) { 
    die("Data gagal disimpan: " . mysqli_error($koneksi)); 
}

// Setelah proses selesai, pengguna diarahkan ke tabel_profile.php agar hasil terbaru dapat dilihat.
header("Location: tabel_profile.php"); 
exit;
?>