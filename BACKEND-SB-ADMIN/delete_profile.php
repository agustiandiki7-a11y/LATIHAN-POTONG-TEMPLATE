<?php
include "connection.php";

// menerima id_profile dari tombol Delete
$id_profile = $_GET['id_profile'];

// menghapus data
$delete = mysqli_query($koneksi, "DELETE FROM profile WHERE id_profile='$id_profile'");

// kembali ke halaman tabel
if ($delete) {
    header("Location: tabel_profile.php");
    
} else {
    echo "Data gagal dihapus: " . mysqli_error($koneksi);
}
?>