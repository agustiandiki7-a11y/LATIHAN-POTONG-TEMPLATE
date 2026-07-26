<?php
include "connection.php";

// Data nama berasal dari input name="nama"
// yang ada di file form_mobile.php.
$vnama = $_POST['nama'];

// Data icon berasal dari input name="icon"
// yang ada di file form_mobile.php.
$vicon = $_POST['icon'];

// Query ini digunakan untuk menyimpan data baru
// ke tabel mobile, tepatnya ke kolom nama dan icon.
$sql_insert = mysqli_query($koneksi, "
    INSERT INTO mobile (nama, icon)
    VALUES ('$vnama', '$vicon')
");

// Jika proses penyimpanan gagal,
// tampilkan pesan error dari database.
if (!$sql_insert) {
    die("Data gagal disimpan: " . mysqli_error($koneksi));
}

// Setelah data berhasil disimpan,
// pengguna diarahkan kembali ke halaman tabel_mobile.php.
header("Location: tabel_mobile.php");
exit;
?>