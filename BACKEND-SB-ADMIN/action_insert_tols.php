<?php
include "connection.php";

$nama = $_POST['nama'];
$icon = $_POST['icon'];

$query = "INSERT INTO tols (nama, icon) VALUES ('$nama', '$icon')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_tols.php?status=success");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>