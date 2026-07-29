<?php
include "connection.php";

$id_skill   = $_POST['id_skill'];
$nama_skill = $_POST['nama_skill'];

$query = "UPDATE sekill SET nama_skill = '$nama_skill' WHERE id_skill = '$id_skill'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_skill.php");
    exit();
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>