<?php
include "connection.php";

$id_training = $_POST['id_training'];
$vtraining = $_POST['nama_training'];
$vwork = $_POST['tahun_training'];
$vplace = $_POST['tempat_training'];
$vdeskripsi = $_POST['deskripsi'];

$sql_update = mysqli_query($koneksi, "
    UPDATE training SET
    nama_training = '$vtraining',
    tahun_training = '$vwork',
    tempat_training = '$vplace',
    deskripsi = '$vdeskripsi'
    WHERE id_training = '$id_training'
");

if (!$sql_update) {
    die("Update gagal: " . mysqli_error($koneksi));
}

header("Location: tabel_training.php");
exit;
?>