<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul portofolio dan terhubung dengan tabel `portofolio` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// menerima id_portofolio dari tombol Delete
// Menerima ID unik portofolio yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_portofolio = $_GET['id_portofolio'];

// menghapus data
// Query DELETE menghapus satu data dari tabel `portofolio` berdasarkan ID yang dikirim tombol Delete.
$delete = mysqli_query($koneksi, "DELETE FROM portofolio WHERE id_portofolio='$id_portofolio'");

// kembali ke halaman tabel
if ($delete) {
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_portofolio.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_portofolio.php");
    exit();
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>
