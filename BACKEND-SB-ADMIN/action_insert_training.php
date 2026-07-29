<?php
include "connection.php";

if (isset($_POST['id_training'])) {

    $id_training    = mysqli_real_escape_string($koneksi, $_POST['id_training']);
    $nama_training  = mysqli_real_escape_string($koneksi, $_POST['nama_training']);
    $tahun_training = mysqli_real_escape_string($koneksi, $_POST['tahun_training']);
    $tempat_training= mysqli_real_escape_string($koneksi, $_POST['tempat_training']);
    $deskripsi      = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $update = mysqli_query($koneksi, "
        UPDATE training SET
            nama_training   = '$nama_training',
            tahun_training  = '$tahun_training',
            tempat_training = '$tempat_training',
            deskripsi       = '$deskripsi'
        WHERE id_training = '$id_training'
    ");

    if ($update) {
        header("Location: tabel_training.php");
        exit();
    } else {
        die("Gagal update database: " . mysqli_error($koneksi));
    }

} else {
    echo "Akses ditolak!";
}
?>