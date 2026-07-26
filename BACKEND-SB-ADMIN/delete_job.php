<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul job dan terhubung dengan tabel `job` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Menerima ID unik pekerjaan yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (empty($_GET['id_job'])) { header("Location: tabel_job.php"); exit; }
// Menerima ID unik pekerjaan yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id=mysqli_real_escape_string($koneksi,$_GET['id_job']);
// Query DELETE menghapus satu data dari tabel `job` berdasarkan ID yang dikirim tombol Delete.
if(!mysqli_query($koneksi,"DELETE FROM job WHERE id_job='$id'")){die("Gagal menghapus data: ".mysqli_error($koneksi));}
// Setelah proses selesai, pengguna diarahkan ke ` tabel_job.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_job.php"); exit;
?>
