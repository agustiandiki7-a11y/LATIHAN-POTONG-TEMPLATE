<?php
include "connection.php";

$id_job = $_POST['id_job'];
$vjob = $_POST['nama_pekerjaan'];
$vwork = $_POST['tahun_pekerjaan'];
$vplace = $_POST['tempat_pekerjaan'];
$vdeskripsi = $_POST['deskripsi'];

$update_job = mysqli_query($koneksi, "
UPDATE job SET
nama_pekerjaan = '$vjob',
tahun_pekerjaan = '$vwork',
tempat_pekerjaan = '$vplace',
deskripsi = '$vdeskripsi'
WHERE id_job = '$id_job'
");

header("Location:tabel_job.php");
?>