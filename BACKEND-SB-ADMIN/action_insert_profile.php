<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul profile dan terhubung dengan tabel `profile` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Memastikan proses hanya dijalankan ketika data dikirim melalui form dengan method POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: form_profile.php"); exit; }
// Mengambil data nama dari input form yang memiliki name="nama".
$nama = mysqli_real_escape_string($koneksi, $_POST['nama'] ?? '');
// Mengambil data deskripsi/overview dari input form yang memiliki name="about".
$about = mysqli_real_escape_string($koneksi, $_POST['about'] ?? '');
// Mengambil data alamat website dari input form yang memiliki name="website".
$website = mysqli_real_escape_string($koneksi, $_POST['website'] ?? '');
// Mengambil data nomor telepon dari input form yang memiliki name="phone".
$phone = mysqli_real_escape_string($koneksi, $_POST['phone'] ?? '');
// Mengambil data alamat email dari input form yang memiliki name="email".
$email = mysqli_real_escape_string($koneksi, $_POST['email'] ?? '');
// Mengambil data alamat dari input form yang memiliki name="address".
$address = mysqli_real_escape_string($koneksi, $_POST['address'] ?? '');
// Mengambil data akun LinkedIn dari input form yang memiliki name="linkedin".
$linkedin = mysqli_real_escape_string($koneksi, $_POST['linkedin'] ?? '');
// Mengambil data kewarganegaraan dari input form yang memiliki name="nationality".
$nationalty = mysqli_real_escape_string($koneksi, $_POST['nationality'] ?? '');
// Query INSERT menyimpan data yang berasal dari form ke tabel `profile` di database.
$sql = "INSERT INTO profile (nama, about, website, phone, email, address, linkedin, nationalty) VALUES ('$nama','$about','$website','$phone','$email','$address','$linkedin','$nationalty')";
// Menjalankan perintah SQL menggunakan koneksi database yang tersimpan pada variabel $koneksi.
if (!mysqli_query($koneksi, $sql)) { die("Data gagal disimpan: " . mysqli_error($koneksi)); }
// Setelah proses selesai, pengguna diarahkan ke ` tabel_profile.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_profile.php"); exit;
?>
