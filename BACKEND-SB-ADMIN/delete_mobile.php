<?php
include "connection.php";

// Menerima id_mobile yang dikirim dari tombol Delete
// pada halaman tabel_mobile.php.
$id_mobile = $_GET['id_mobile'];

// Query DELETE digunakan untuk menghapus data
// dari tabel mobile berdasarkan id_mobile.
$delete_mobile = mysqli_query($koneksi, "
    DELETE FROM mobile
    WHERE id_mobile = '$id_mobile'
");

// Mengecek apakah proses penghapusan berhasil.
if (!$delete_mobile) {
    die("Data gagal dihapus: " . mysqli_error($koneksi));
}

// Setelah data berhasil dihapus,
// pengguna diarahkan kembali ke halaman tabel_mobile.php.
header("Location: tabel_mobile.php");
exit;
?>