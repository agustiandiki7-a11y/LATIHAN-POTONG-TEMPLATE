<?php
include "connection.php";

if (isset($_POST['submit'])) {

    $judul = mysqli_real_escape_string($koneksi, $_POST['judul_portofolio']);
    $link = mysqli_real_escape_string($koneksi, $_POST['link']);
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    if ($_FILES['img']['name'] != "") {

        $folder = "foto/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $namaFile = time() . "_" . basename($_FILES["img"]["name"]);
        $tmpFile = $_FILES["img"]["tmp_name"];

        if (move_uploaded_file($tmpFile, $folder . $namaFile)) {

            $query = mysqli_query($koneksi, "
                INSERT INTO portfolio
                (
                    judul_portfolio,
                    img,
                    link,
                    jenis,
                    deskripsi
                )
                VALUES
                (
                    '$judul',
                    '$namaFile',
                    '$link',
                    '$jenis',
                    '$deskripsi'
                )
            ");

            if ($query) {
                echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location='tabel_portofolio.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Gagal menyimpan data');
                        window.history.back();
                      </script>";
            }

        } else {

            echo "<script>
                    alert('Upload gambar gagal');
                    window.history.back();
                  </script>";

        }

    } else {

        echo "<script>
                alert('Silakan pilih gambar');
                window.history.back();
              </script>";

    }

} else {

    header("Location: form_portofolio.php");
    exit();

}
?>