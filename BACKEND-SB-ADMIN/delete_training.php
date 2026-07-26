<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul training dan terhubung dengan tabel `training` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Menerima ID unik training yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (empty($_GET['id_training'])) { header("Location: tabel_training.php"); exit; }
// Menerima ID unik training yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id=mysqli_real_escape_string($koneksi,$_GET['id_training']);
// Query DELETE menghapus satu data dari tabel `training` berdasarkan ID yang dikirim tombol Delete.
if(!mysqli_query($koneksi,"DELETE FROM training WHERE id_training='$id'")){die("Gagal menghapus data: ".mysqli_error($koneksi));}
// Setelah proses selesai, pengguna diarahkan ke ` tabel_training.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_training.php"); exit;
?>
