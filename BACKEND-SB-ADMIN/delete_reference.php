<?php
include "connection.php";

// Menangkap parameter ID dari URL (?id=...)
if (isset($_GET['id'])) {
    $id_reperence = $_GET['id'];

    // Query hapus data berdasarkan id_reperence (pake p)
    $query = "DELETE FROM reference WHERE id_reperence = '$id_reperence'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect kembali ke tabel_referece.php
        header("Location: tabel_referece.php");
        exit();
    } else {
        die("Gagal menghapus data: " . mysqli_error($koneksi));
    }
} else {
    header("Location: tabel_referece.php");
    exit();
}
?>