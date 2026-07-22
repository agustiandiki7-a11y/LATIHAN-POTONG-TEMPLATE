<?php
include "connection.php";

$id = $_POST['id_education'];
$nama = $_POST['nama_jurusan'];
$tahun = $_POST['tahun_belajar'];
$temapat = $_POST['temapat_belajar'];
$deskripsi = $_POST['deskripsi'];

$query = mysqli_query($koneksi, "
UPDATE education SET
    nama_jurusan = '$nama',
    tahun_belajar = '$tahun',
    temapat_belajar = '$temapat',
    deskripsi = '$deskripsi'
WHERE id_education = '$id'
");

if ($query) {
    header("Location: tabel_education.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>