<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul education dan terhubung dengan tabel `education` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Menerima ID unik pendidikan yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (empty($_GET['id_education'])) { header("Location: tabel_education.php"); exit; }
// Menerima ID unik pendidikan yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id=mysqli_real_escape_string($koneksi,$_GET['id_education']);
// Query DELETE menghapus satu data dari tabel `education` berdasarkan ID yang dikirim tombol Delete.
if(!mysqli_query($koneksi,"DELETE FROM education WHERE id_education='$id'")){die("Gagal menghapus data: ".mysqli_error($koneksi));}
// Setelah proses selesai, pengguna diarahkan ke ` tabel_education.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_education.php"); exit;
?>
