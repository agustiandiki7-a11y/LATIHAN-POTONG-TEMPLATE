<?php
include "connection.php";

if (isset($_POST['submit'])) {

    // 1. Ambil input data dari form
    $vjudul     = mysqli_real_escape_string($koneksi, $_POST['judul_portfolio']);
    $vlink      = mysqli_real_escape_string($koneksi, $_POST['link']);
    $vdeskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // 2. Cek apakah ada file gambar yang diunggah
    if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {

        // Folder penyimpanan gambar
        $target_dir = __DIR__ . "/foto/";

        // Buat folder 'foto/' otomatis jika belum ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Buat nama file unik dengan time()
        $ext         = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $vimgname    = time() . "." . $ext;
        $target_file = $target_dir . $vimgname;

        // 3. Pindahkan gambar ke folder foto/
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {

            // 4. Query insert ke tabel portofolio
            $query = "INSERT INTO portofolio (judul_portofolio, img, link, deskripsi) 
                      VALUES ('$vjudul', '$vimgname', '$vlink', '$vdeskripsi')";

            $sql_insert = mysqli_query($koneksi, $query);

            if ($sql_insert) {
                // Berhasil -> Kembali ke tabel_portofolio.php
                header("Location: tabel_portofolio.php");
                exit();
            } else {
                die("Gagal simpan ke database: " . mysqli_error($koneksi));
            }

        } else {
            die("Gagal mengunggah gambar ke folder foto/!");
        }

    } else {
        die("Harap pilih gambar terlebih dahulu!");
    }

} else {
    header("Location: form_portofolio.php");
    exit();
}
?>