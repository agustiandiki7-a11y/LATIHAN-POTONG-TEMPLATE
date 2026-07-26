<?php
include "connection.php";

// Menerima id_mobile dari form update
$id_mobile = $_POST['id_mobile'];

// Mengambil data nama dari form
$vnama = $_POST['nama'];

// Mengambil data icon dari form
$vicon = $_POST['icon'];

// Query untuk mengubah data pada tabel mobile
$update_mobile = mysqli_query($koneksi, "
UPDATE mobile SET
nama = '$vnama',
icon = '$vicon'
WHERE id_mobile = '$id_mobile'
");

// Mengecek apakah proses update berhasil
if (!$update_mobile) {
    die("Data gagal diupdate : " . mysqli_error($koneksi));
}

// Kembali ke halaman tabel mobile
header("Location:tabel_mobile.php");
exit;
?>