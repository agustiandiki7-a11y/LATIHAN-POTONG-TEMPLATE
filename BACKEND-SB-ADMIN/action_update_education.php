<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul education dan terhubung dengan tabel `education` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data ID unik pendidikan dari input form yang memiliki name="id_education".
$id = $_POST['id_education'];
// Mengambil data nama_jurusan dari input form yang memiliki name="nama_jurusan".
$nama = $_POST['nama_jurusan'];
// Mengambil data tahun_belajar dari input form yang memiliki name="tahun_belajar".
$tahun = $_POST['tahun_belajar'];
// Mengambil data temapat_belajar dari input form yang memiliki name="temapat_belajar".
$temapat = $_POST['temapat_belajar'];
// Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
$deskripsi = $_POST['deskripsi'];

// Menjalankan perintah SQL menggunakan koneksi database yang tersimpan pada variabel $koneksi.
$query = mysqli_query($koneksi, "
UPDATE education SET
    nama_jurusan = '$nama',
    tahun_belajar = '$tahun',
    temapat_belajar = '$temapat',
    deskripsi = '$deskripsi'
WHERE id_education = '$id'
");

if ($query) {
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_education.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_education.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>
