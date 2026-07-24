<?php
include "connection.php";

// 1. Cek apakah ID dikirim dari form update (id_sedebar_foto)
if (isset($_POST['id_sedebar_foto']) && !empty($_POST['id_sedebar_foto'])) {

    $id_sedebar_foto = mysqli_real_escape_string($koneksi, $_POST['id_sedebar_foto']);
    $target_dir      = __DIR__ . "/sidebar_foto/";

    // Buat folder 'sidebar_foto/' otomatis jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // 2. Cek apakah ada file foto baru yang diunggah dari input 'sidebar_foto'
    if (isset($_FILES['sidebar_foto']['name']) && $_FILES['sidebar_foto']['name'] != "") {

        // Buat nama file unik memakai time()
        $ext       = pathinfo($_FILES['sidebar_foto']['name'], PATHINFO_EXTENSION);
        $vfoto     = time() . "." . $ext;
        $target_file = $target_dir . $vfoto;

        // Ambil data foto lama dari tabel 'sidebar_foto' untuk dihapus
        $query_lama = mysqli_query($koneksi, "SELECT sidebar_foto FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");
        
        if ($query_lama && mysqli_num_rows($query_lama) > 0) {
            $data_lama = mysqli_fetch_object($query_lama);
            if (!empty($data_lama->sidebar_foto) && file_exists($target_dir . $data_lama->sidebar_foto)) {
                unlink($target_dir . $data_lama->sidebar_foto); // Hapus foto lama
            }
        }

        // Pindahkan foto baru ke folder sidebar_foto/
        if (move_uploaded_file($_FILES['sidebar_foto']['tmp_name'], $target_file)) {

            // Update nama file gambar di tabel 'sidebar_foto'
            $sql_update = mysqli_query($koneksi, "
                UPDATE sidebar_foto SET 
                    sidebar_foto = '$vfoto' 
                WHERE id_sedebar_foto = '$id_sedebar_foto'
            ");

        } else {
            die("Gagal memindahkan file foto baru ke folder sidebar_foto/!");
        }

    } else {
        // Jika tidak upload foto baru, anggap berhasil tanpa mengubah DB
        $sql_update = true;
    }

    if ($sql_update) {
        // Berhasil update, alihkan kembali ke tabel_sidebar_foto.php
        header("Location: tabel_sidebar_foto.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($koneksi));
    }

} else {
    // Jika ID tidak ditemukan/akses langsung
    header("Location: tabel_sidebar_foto.php");
    exit();
}
?>