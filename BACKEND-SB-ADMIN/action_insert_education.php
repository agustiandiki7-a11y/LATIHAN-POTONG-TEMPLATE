<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul education dan terhubung dengan tabel `education` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data nama_jurusan dari input form yang memiliki name="nama_jurusan".
$vjurusan   = $_POST['nama_jurusan'];
// Mengambil data tahun_belajar dari input form yang memiliki name="tahun_belajar".
$vbelajar   = $_POST['tahun_belajar'];
// Mengambil data temapat_belajar dari input form yang memiliki name="temapat_belajar".
$vtempat    = $_POST['temapat_belajar'];
// Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
$vdeskripsi = $_POST['deskripsi'];

$sql_insert = mysqli_query($koneksi, "
INSERT INTO education
(nama_jurusan, tahun_belajar, temapat_belajar, deskripsi)
VALUES
('$vjurusan', '$vbelajar', '$vtempat', '$vdeskripsi')
");

// Setelah proses selesai, pengguna diarahkan ke ` tabel_education.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_education.php");

?>
