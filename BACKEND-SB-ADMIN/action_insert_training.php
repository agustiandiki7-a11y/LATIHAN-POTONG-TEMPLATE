<?php
include "connection.php";

$nama_training   = $_POST['nama_training'];
$tahun_training  = $_POST['tahun_training'];
$tempat_training = $_POST['tempat_training'];
$deskripsi       = $_POST['deskripsi'];

$sql_insert = mysqli_query($koneksi, "
    INSERT INTO training (nama_training, tahun_training, tempat_training, deskripsi)
    VALUES ('$nama_training', '$tahun_training', '$tempat_training', '$deskripsi')
");

header("location:tabel_training.php");
?>