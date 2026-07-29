<?php
include "connection.php";

$id = $_GET['id'];

$query = "DELETE FROM login WHERE id_login = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_login.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>