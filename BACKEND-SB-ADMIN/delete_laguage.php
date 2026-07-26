<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul laguage dan terhubung dengan tabel `laguage` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Memeriksa apakah id_laguage ada di URL
// Menerima ID unik bahasa yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (isset($_GET['id_laguage']) && !empty($_GET['id_laguage'])) {

    // Menerima ID unik bahasa yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
    $id_laguage = mysqli_real_escape_string($koneksi, $_GET['id_laguage']);

    // 1. Ambil nama file gambar bendera dari database sebelum datanya dihapus
    $query_gambar = mysqli_query($koneksi, "SELECT flag FROM laguage WHERE id_laguage='$id_laguage'");
    // Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
    $data_gambar  = mysqli_fetch_object($query_gambar);

    // 2. Jika file gambar bendera ada di folder flag/, hapus gambarnya terlebih dahulu
    if ($data_gambar && !empty($data_gambar->flag)) {
        $file_path = __DIR__ . "/flag/" . $data_gambar->flag;
        if (file_exists($file_path)) {
            unlink($file_path); // Menghapus file gambar dari laptop/server
        }
    }

    // 3. Jalankan query SQL untuk menghapus baris data dari tabel 'laguage'
    // Query DELETE menghapus satu data dari tabel `laguage` berdasarkan ID yang dikirim tombol Delete.
    $delete = mysqli_query($koneksi, "DELETE FROM laguage WHERE id_laguage='$id_laguage'");

    if ($delete) {
        // Setelah sukses hapus, kembalikan ke halaman tabel
        // Setelah proses selesai, pengguna diarahkan ke ` table_laguage.php` agar hasil terbaru dapat dilihat.
        header("Location: table_laguage.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }

} else {
    // Jika tidak ada ID yang dikirim, langsung alihkan ke tabel
    // Setelah proses selesai, pengguna diarahkan ke ` table_laguage.php` agar hasil terbaru dapat dilihat.
    header("Location: table_laguage.php");
    exit();
}
?>
