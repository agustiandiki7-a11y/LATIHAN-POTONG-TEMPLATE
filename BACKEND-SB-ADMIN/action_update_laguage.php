<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul laguage dan terhubung dengan tabel `laguage` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data ID unik bahasa dari input form yang memiliki name="id_laguage".
if (isset($_POST['id_laguage'])) {

    // Mengambil data ID unik bahasa dari input form yang memiliki name="id_laguage".
    $id_laguage = $_POST['id_laguage'];
    // Mengambil data bahasa dari input form yang memiliki name="bahasa".
    $vbahasa    = $_POST['bahasa'];

    // Cek apakah ada file yang diunggah
    if (isset($_FILES['flag']['name']) && $_FILES['flag']['name'] != "") {

        $ext      = pathinfo($_FILES['flag']['name'], PATHINFO_EXTENSION);
        $vflagimg = time() . "." . $ext;
        
        // Menggunakan path absolut agar folder 'flag' pasti terdeteksi
        $target_dir  = __DIR__ . "/flag/";
        $target_file = $target_dir . $vflagimg;

        // Buat folder 'flag' otomatis jika belum ada lewat PHP
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Pindahkan file ke folder flag/
        if (move_uploaded_file($_FILES['flag']['tmp_name'], $target_file)) {
            
            // Update nama bahasa dan nama file di database
            $update = mysqli_query($koneksi, "
                UPDATE laguage SET
                    bahasa = '$vbahasa',
                    flag   = '$vflagimg'
                WHERE id_laguage = '$id_laguage'
            ");

        } else {
            die("Gagal memindahkan file ke folder flag/! Cek izin folder atau ukuran file.");
        }

    } else {

        // Jika tidak upload gambar baru, update bahasanya saja
        $update = mysqli_query($koneksi, "
            UPDATE laguage SET
                bahasa = '$vbahasa'
            WHERE id_laguage = '$id_laguage'
        ");

    }

    if ($update) {
        // Setelah proses selesai, pengguna diarahkan ke ` table_laguage.php` agar hasil terbaru dapat dilihat.
        header("Location: table_laguage.php");
        exit();
    } else {
        die("Gagal update database: " . mysqli_error($koneksi));
    }

} else {
    echo "Akses ditolak!";
}
?>
