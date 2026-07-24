<?php
include "connection.php";

$vjob       = $_POST['nama_pekerjaan'];
$vwork      = $_POST['tahun_pekerjaan'];
$vplace     = $_POST['tempat_pekerjaan'];
$vdeskripsi = $_POST['deskripsi'];

$sql_insert = mysqli_query($koneksi, "
    INSERT INTO job
    (nama_pekerjaan, tahun_pekerjaan, tempat_pekerjaan, deskripsi)
    VALUES
    ('$vjob', '$vwork', '$vplace', '$vdeskripsi')
");

if ($sql_insert) {
    header("Location: tabel_job.php");
}
?>