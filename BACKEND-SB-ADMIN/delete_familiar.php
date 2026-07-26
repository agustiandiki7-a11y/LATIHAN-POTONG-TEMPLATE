<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul familiar dan terhubung dengan tabel `familiar` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Menerima ID unik familiar yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (empty($_GET['id_familiar'])) { header("Location: tabel_familiar.php"); exit; }
// Menerima ID unik familiar yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id=mysqli_real_escape_string($koneksi,$_GET['id_familiar']);
// Query DELETE menghapus satu data dari tabel `familiar` berdasarkan ID yang dikirim tombol Delete.
if(!mysqli_query($koneksi,"DELETE FROM familiar WHERE id_familiar='$id'")){die("Gagal menghapus data: ".mysqli_error($koneksi));}
// Setelah proses selesai, pengguna diarahkan ke ` tabel_familiar.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_familiar.php"); exit;
?>
