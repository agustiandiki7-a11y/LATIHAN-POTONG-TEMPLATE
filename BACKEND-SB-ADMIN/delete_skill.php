<?php
include "connection.php";

$id_skill = $_GET['id'];

$query = "DELETE FROM sekill WHERE id_skill = '$id_skill'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_skill.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>