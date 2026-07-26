<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul sidebar_foto dan terhubung dengan tabel `sidebar_foto` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Cek apakah ada file foto yang dikirim dari form tambah
if (isset($_FILES['sidebar_foto']['name']) && $_FILES['sidebar_foto']['name'] != "") {

    // Lokasi folder penyimpanan disamakan: sidebar_foto
    $target_dir = __DIR__ . "/sidebar_foto/";

    // Otomatis buat folder jika belum ada di laptop
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Buat nama file unik menggunakan time()
    $ext         = pathinfo($_FILES['sidebar_foto']['name'], PATHINFO_EXTENSION);
    $vfoto       = time() . "." . $ext;
    $target_file = $target_dir . $vfoto;

    // Pindahkan foto ke folder sidebar_foto/
    if (move_uploaded_file($_FILES['sidebar_foto']['tmp_name'], $target_file)) {

        // Query INSERT ke tabel sidebar_foto
        // Query INSERT menyimpan data yang berasal dari form ke tabel `sidebar_foto` di database.
        $sql = "INSERT INTO sidebar_foto (sidebar_foto) VALUES ('$vfoto')";
        $sql_insert = mysqli_query($koneksi, $sql);

        if ($sql_insert) {
            // Setelah proses selesai, pengguna diarahkan ke ` tabel_sidebar_foto.php` agar hasil terbaru dapat dilihat.
            header("Location: tabel_sidebar_foto.php");
            exit();
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
        }

    } else {
        echo "Gagal mengunggah gambar ke folder target!";
    }

} else {
    // Jika diakses tanpa submit foto
    // Setelah proses selesai, pengguna diarahkan ke ` form_sidebar_foto.php` agar hasil terbaru dapat dilihat.
    header("Location: form_sidebar_foto.php");
    exit();
}
?>
