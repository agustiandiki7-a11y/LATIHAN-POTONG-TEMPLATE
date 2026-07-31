<?php
include "connection.php";
$vnama = $_POST['nama'];
$vicon = $_POST['icon'];
$sql_insert = mysqli_query($koneksi, "
    INSERT INTO mobile (nama, icon)
    VALUES ('$vnama', '$vicon')
");

if (!$sql_insert) {
    die("Data gagal disimpan: " . mysqli_error($koneksi));
}
header("Location: tabel_mobile.php");
?>