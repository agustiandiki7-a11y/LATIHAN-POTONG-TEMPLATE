<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul training dan terhubung dengan tabel `training` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data nama training dari input form yang memiliki name="nama_training".
$nama_training   = $_POST['nama_training'];
// Mengambil data tahun training dari input form yang memiliki name="tahun_training".
$tahun_training  = $_POST['tahun_training'];
// Mengambil data tempat training dari input form yang memiliki name="tempat_training".
$tempat_training = $_POST['tempat_training'];
// Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
$deskripsi       = $_POST['deskripsi'];

$sql_insert = mysqli_query($koneksi, "
    INSERT INTO training (nama_training, tahun_training, tempat_training, deskripsi)
    VALUES ('$nama_training', '$tahun_training', '$tempat_training', '$deskripsi')
");

// Setelah proses selesai, pengguna diarahkan ke `tabel_training.php` agar hasil terbaru dapat dilihat.
header("location:tabel_training.php");
?>
