<?php
// Memanggil koneksi database
include "connection.php";

// Mengambil ID dari URL
$id = $_GET['id'];

// Query Delete
$query = "DELETE FROM tols WHERE id_tols = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Berhasil, kembalikan ke tabel_tols.php
    header("Location: tabel_tols.php");
} else {
    // Gagal
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>