<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul profile dan terhubung dengan tabel `profile` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Menerima ID unik profile yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (empty($_GET['id_profile'])) { header("Location: tabel_profile.php"); exit; }
// Menerima ID unik profile yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id=mysqli_real_escape_string($koneksi,$_GET['id_profile']);
// Query DELETE menghapus satu data dari tabel `profile` berdasarkan ID yang dikirim tombol Delete.
if(!mysqli_query($koneksi,"DELETE FROM profile WHERE id_profile='$id'")){die("Gagal menghapus data: ".mysqli_error($koneksi));}
// Setelah proses selesai, pengguna diarahkan ke ` tabel_profile.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_profile.php"); exit;
?>
