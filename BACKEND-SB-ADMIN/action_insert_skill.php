<?php
include "connection.php";

$nama_skill = $_POST['nama_skill'];

$query = "INSERT INTO sekill (nama_skill) VALUES ('$nama_skill')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_skill.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>