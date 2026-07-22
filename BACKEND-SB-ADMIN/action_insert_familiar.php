<?php include "connection.php";

$vnama=$_POST['nama'];
$vicon = $_POST['icon'];

$sql_insert = mysqli_query($koneksi,"INSERT INTO familiar(nama,icon)values ('$vnama','$vicon')");
header("location:tabel_familiar.php");