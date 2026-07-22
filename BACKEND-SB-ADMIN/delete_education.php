<?php
include "connection.php";

$id_education = $_GET['id_education'];

$delete = mysqli_query($koneksi, "
DELETE FROM education
WHERE id_education = '$id_education'
");

header("Location: tabel_education.php");
?>