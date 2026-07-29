<?php
include "connection.php";

if (isset($_POST['id_language'])) {

    $id_language = mysqli_real_escape_string($koneksi, $_POST['id_language']);
    $vbahasa     = mysqli_real_escape_string($koneksi, $_POST['bahasa']);

    // Cek apakah ada file bendera baru yang diunggah
    if (isset($_FILES['flag']['name']) && $_FILES['flag']['name'] != "") {

        $ext        = pathinfo($_FILES['flag']['name'], PATHINFO_EXTENSION);
        $vflagimg   = time() . "." . $ext;
        $target_dir = __DIR__ . "/flag/";
        $target_file = $target_dir . $vflagimg;

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['flag']['tmp_name'], $target_file)) {
            
            // DIPERBAIKI: Menggunakan nama tabel `laguage` (sesuai phpMyAdmin)
            $old_query = mysqli_query($koneksi, "SELECT flag FROM laguage WHERE id_language='$id_language'");
            $old_data  = mysqli_fetch_object($old_query);
            
            // Hapus foto lama jika ada di folder
            if ($old_data && !empty($old_data->flag) && file_exists($target_dir . $old_data->flag)) {
                unlink($target_dir . $old_data->flag);
            }

            // DIPERBAIKI: Menggunakan nama tabel `laguage`
            $update = mysqli_query($koneksi, "
                UPDATE laguage SET
                    bahasa = '$vbahasa',
                    flag   = '$vflagimg'
                WHERE id_language = '$id_language'
            ");

        } else {
            die("Gagal memindahkan file ke folder flag/!");
        }

    } else {
        // Jika tidak upload gambar baru, update nama bahasanya saja
        // DIPERBAIKI: Menggunakan nama tabel `laguage`
        $update = mysqli_query($koneksi, "
            UPDATE laguage SET
                bahasa = '$vbahasa'
            WHERE id_language = '$id_language'
        ");
    }

    if ($update) {
        header("Location: tabel_language.php");
        exit();
    } else {
        die("Gagal update database: " . mysqli_error($koneksi));
    }

} else {
    echo "Akses ditolak!";
}
?>