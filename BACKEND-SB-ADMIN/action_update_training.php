<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul training dan terhubung dengan tabel `training` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data ID unik training dari input form yang memiliki name="id_training".
$id_training = $_POST['id_training'];
// Mengambil data nama training dari input form yang memiliki name="nama_training".
$vtraining = $_POST['nama_training'];
// Mengambil data tahun training dari input form yang memiliki name="tahun_training".
$vwork = $_POST['tahun_training'];
// Mengambil data tempat training dari input form yang memiliki name="tempat_training".
$vplace = $_POST['tempat_training'];
// Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
$vdeskripsi = $_POST['deskripsi'];

$sql_update = mysqli_query($koneksi, "
    UPDATE training SET
    nama_training = '$vtraining',
    tahun_training = '$vwork',
    tempat_training = '$vplace',
    deskripsi = '$vdeskripsi'
    WHERE id_training = '$id_training'
");

if (!$sql_update) {
    die("Update gagal: " . mysqli_error($koneksi));
}

// Setelah proses selesai, pengguna diarahkan ke ` tabel_training.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_training.php");
exit;
?>
