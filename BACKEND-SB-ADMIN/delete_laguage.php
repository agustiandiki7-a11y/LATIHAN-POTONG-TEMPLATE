<?php
include "connection.php";

// Memeriksa apakah id_laguage ada di URL
if (isset($_GET['id_laguage']) && !empty($_GET['id_laguage'])) {

    $id_laguage = mysqli_real_escape_string($koneksi, $_GET['id_laguage']);

    // 1. Ambil nama file gambar bendera dari database sebelum datanya dihapus
    $query_gambar = mysqli_query($koneksi, "SELECT flag FROM laguage WHERE id_laguage='$id_laguage'");
    $data_gambar  = mysqli_fetch_object($query_gambar);

    // 2. Jika file gambar bendera ada di folder flag/, hapus gambarnya terlebih dahulu
    if ($data_gambar && !empty($data_gambar->flag)) {
        $file_path = __DIR__ . "/flag/" . $data_gambar->flag;
        if (file_exists($file_path)) {
            unlink($file_path); // Menghapus file gambar dari laptop/server
        }
    }

    // 3. Jalankan query SQL untuk menghapus baris data dari tabel 'laguage'
    $delete = mysqli_query($koneksi, "DELETE FROM laguage WHERE id_laguage='$id_laguage'");

    if ($delete) {
        // Setelah sukses hapus, kembalikan ke halaman tabel
        header("Location: table_laguage.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    // Jika tidak ada ID yang dikirim, langsung alihkan ke tabel
    header("Location: table_laguage.php");
    exit();
}
?>