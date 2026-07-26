<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul job dan terhubung dengan tabel `job` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data ID unik pekerjaan dari input form yang memiliki name="id_job".
$id_job = $_POST['id_job'];
// Mengambil data nama pekerjaan dari input form yang memiliki name="nama_pekerjaan".
$vjob = $_POST['nama_pekerjaan'];
// Mengambil data tahun pekerjaan dari input form yang memiliki name="tahun_pekerjaan".
$vwork = $_POST['tahun_pekerjaan'];
// Mengambil data tempat pekerjaan dari input form yang memiliki name="tempat_pekerjaan".
$vplace = $_POST['tempat_pekerjaan'];
// Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
$vdeskripsi = $_POST['deskripsi'];

$update_job = mysqli_query($koneksi, "
UPDATE job SET
nama_pekerjaan = '$vjob',
tahun_pekerjaan = '$vwork',
tempat_pekerjaan = '$vplace',
deskripsi = '$vdeskripsi'
WHERE id_job = '$id_job'
");

// Setelah proses selesai, pengguna diarahkan ke `tabel_job.php` agar hasil terbaru dapat dilihat.
header("Location:tabel_job.php");
?>
