<?php
include "connection.php";

// menerima id_portofolio dari tombol Delete
$id_portofolio = $_GET['id_portofolio'];

// menghapus data
$delete = mysqli_query($koneksi, "DELETE FROM portofolio WHERE id_portofolio='$id_portofolio'");

// kembali ke halaman tabel
if ($delete) {
    header("Location: tabel_portofolio.php");
    exit();
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>