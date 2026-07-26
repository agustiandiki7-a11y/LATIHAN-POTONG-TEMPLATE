<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul sidebar_foto dan terhubung dengan tabel `sidebar_foto` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Memastikan parameter id_sedebar_foto ada di URL
// Menerima id_sedebar_foto yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (isset($_GET['id_sedebar_foto']) && !empty($_GET['id_sedebar_foto'])) {

    // Menerima id_sedebar_foto yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
    $id_sedebar_foto = mysqli_real_escape_string($koneksi, $_GET['id_sedebar_foto']);

    // 1. Ambil nama file foto dari database sebelum datanya dihapus
    $query = mysqli_query($koneksi, "SELECT sidebar_foto FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");
    // Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
    $data  = mysqli_fetch_object($query);

    if ($data) {
        $path_file = __DIR__ . "/sidebar_foto/" . $data->sidebar_foto;

        // Hapus file gambar fisiknya dari folder jika file tersebut ada
        if (!empty($data->sidebar_foto) && file_exists($path_file)) {
            unlink($path_file);
        }

        // 2. Perintah SQL untuk menghapus data dari tabel sidebar_foto
        // Query DELETE menghapus satu data dari tabel `sidebar_foto` berdasarkan ID yang dikirim tombol Delete.
        $delete = mysqli_query($koneksi, "DELETE FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");

        if ($delete) {
            // Setelah berhasil, kembalikan ke halaman tabel
            // Setelah proses selesai, pengguna diarahkan ke ` tabel_sidebar_foto.php` agar hasil terbaru dapat dilihat.
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
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_sidebar_foto.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_sidebar_foto.php");
    exit();
}
?>
