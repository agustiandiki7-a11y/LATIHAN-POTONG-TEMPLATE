<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul familiar dan terhubung dengan tabel `familiar` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data ID unik familiar dari input form yang memiliki name="id_familiar".
$id_familiar = $_POST['id_familiar'];
// Mengambil data nama dari input form yang memiliki name="nama".
$vnama       = $_POST['nama'];
// Mengambil data icon dari input form yang memiliki name="icon".
$vicon       = $_POST['icon'];

$sql_update = "
    UPDATE familiar SET
        nama = '$vnama',
        icon = '$vicon'
    WHERE id_familiar = '$id_familiar'
";

$update = mysqli_query($koneksi, $sql_update);

if ($update) {
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_familiar.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_familiar.php");
    exit;
} else {
    echo "Update gagal: " . mysqli_error($koneksi);
}
?>     
