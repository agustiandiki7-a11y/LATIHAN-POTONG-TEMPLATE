<?php
// Memanggil koneksi database
include "connection.php";

// Menerima data dari form POST
$id_tols = $_POST['id_tols'];
$nama    = $_POST['nama'];
$icon    = $_POST['icon'];

// Query Update
$query = "UPDATE tols SET nama = '$nama', icon = '$icon' WHERE id_tols = '$id_tols'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Berhasil, kembalikan ke tabel_tols.php
    header("Location: tabel_tols.php");
} else {
    // Gagal
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>