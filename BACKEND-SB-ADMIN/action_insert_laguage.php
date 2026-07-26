<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul laguage dan terhubung dengan tabel `laguage` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data bahasa dari input form yang memiliki name="bahasa".
$vbahasa  = $_POST['bahasa'];
$vflagimg = time() . ".jpg";

$path = "flag/";

// DIPERBAIKI: Tambahkan titik (.) untuk gabung string $path dan $vflagimg
move_uploaded_file($_FILES['flag']['tmp_name'], $path . $vflagimg);

// Sesuaikan nama tabel 'laguage' / 'language' dengan nama tabel di database kamu
$sql_insert = mysqli_query($koneksi, "
    INSERT INTO laguage
    (bahasa, flag)
    VALUES
    ('$vbahasa', '$vflagimg') 
"); // DIPERBAIKI: Variabel diubah dari $vflag ke $vflagimg

if ($sql_insert) {
    // Setelah proses selesai, pengguna diarahkan ke ` table_laguage.php` agar hasil terbaru dapat dilihat.
    header("Location: table_laguage.php");
} 
?>
