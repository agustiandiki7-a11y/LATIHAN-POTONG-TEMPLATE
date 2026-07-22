<!-- we are from tabel_profile -->

<?php
include "connection.php";

// untuk menerima id_profile yang dibawa dari tombol DELETE dari TABEL
// PROFILE menggunakan $id_profile
// $_GET['id_profile']; menyimpan sementara id yang nanti akan
// digunakan pada perintah DELETE di bawahnya.
$id_familiar = $_GET['id_familiar'];

// ini perintah sql untuk mendelete data berdasarkan id_profile yang
// dibawa
$delete = mysqli_query($koneksi, "
    DELETE FROM familiar
    WHERE id_familiar='$id_familiar'
");

// setelah proses delete dijalankan, maka akan kembali ke file
// tabel_profile.php
header("Location: tabel_familiar.php");
?>