<?php include "connection.php";
 
$vicon = $_POST['icon'];
$sql_insert = mysqli_query($koneksi,"INSERT INTO familiar(nama,icon)values ('$vnama','$vicon')");

header("location:tabel_familiar.php");
