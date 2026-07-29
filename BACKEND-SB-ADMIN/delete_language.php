<?php
include "connection.php";

if (isset($_GET['id_language']) && !empty($_GET['id_language'])) {

    $id_language = mysqli_real_escape_string($koneksi, $_GET['id_language']);

    // 1. Ambil nama file gambar bendera
    $query_gambar = mysqli_query($koneksi, "SELECT flag FROM language WHERE id_language='$id_language'");
    $data_gambar  = mysqli_fetch_object($query_gambar);

    // 2. Hapus file dari folder
    if ($data_gambar && !empty($data_gambar->flag)) {
        $file_path = __DIR__ . "/flag/" . $data_gambar->flag;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // 3. Jalankan query DELETE
    $delete = mysqli_query($koneksi, "DELETE FROM language WHERE id_language='$id_language'");

    if ($delete) {
        header("Location: table_language.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    header("Location: table_language.php");
    exit();
}
?>