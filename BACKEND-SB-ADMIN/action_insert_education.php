<?php
include "connection.php";

$vjurusan   = $_POST['nama_jurusan'];
$vbelajar   = $_POST['tahun_belajar'];
$vtempat    = $_POST['temapat_belajar'];
$vdeskripsi = $_POST['deskripsi'];

$sql_insert = mysqli_query($koneksi, "
INSERT INTO education
(nama_jurusan, tahun_belajar, temapat_belajar, deskripsi)
VALUES
('$vjurusan', '$vbelajar', '$vtempat', '$vdeskripsi')
");

header("Location: tabel_education.php");

?>