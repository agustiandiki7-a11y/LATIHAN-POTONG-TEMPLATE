<?php
include "connection.php";

$id_profile   = $_POST['id_profile'];
$vnama        = $_POST['nama'];
$vdeskripsi   = $_POST['about'];
$vwebsite     = $_POST['website'];
$vphone       = $_POST['phone'];
$vemail       = $_POST['email'];
$vcity        = $_POST['address'];
$vlinkedin    = $_POST['linkedin'];

// Nama input form adalah nationality
$vnationalty = $_POST['nationalty'];

$update_profile = mysqli_query($koneksi, "
    UPDATE profile SET
        nama='$vnama',
        about='$vdeskripsi',
        website='$vwebsite',
        phone='$vphone',
        email='$vemail',
        address='$vcity',
        linkedin='$vlinkedin',
        nationalty='$vnationalty'
    WHERE id_profile='$id_profile'
");

if ($update_profile) {
    header("Location: tabel_profile.php");
}
?>