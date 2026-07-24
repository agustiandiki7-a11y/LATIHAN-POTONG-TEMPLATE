<?php
include "connection.php";

// Memastikan parameter id_sedebar_foto ada di URL
if (isset($_GET['id_sedebar_foto']) && !empty($_GET['id_sedebar_foto'])) {

    $id_sedebar_foto = mysqli_real_escape_string($koneksi, $_GET['id_sedebar_foto']);

    // 1. Ambil nama file foto dari database sebelum datanya dihapus
    $query = mysqli_query($koneksi, "SELECT sidebar_foto FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");
    $data  = mysqli_fetch_object($query);

    if ($data) {
        $path_file = __DIR__ . "/sidebar_foto/" . $data->sidebar_foto;

        // Hapus file gambar fisiknya dari folder jika file tersebut ada
        if (!empty($data->sidebar_foto) && file_exists($path_file)) {
            unlink($path_file);
        }

        // 2. Perintah SQL untuk menghapus data dari tabel sidebar_foto
        $delete = mysqli_query($koneksi, "DELETE FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");

        if ($delete) {
            // Setelah berhasil, kembalikan ke halaman tabel
            header("Location: tabel_sidebar_foto.php");
            exit();
        } else {
            echo "Gagal menghapus data dari database: " . mysqli_error($koneksi);
        }

    } else {
        echo "Data tidak ditemukan!";
    }

} else {
    // Jika diakses tanpa parameter ID
    header("Location: tabel_sidebar_foto.php");
    exit();
}
?>