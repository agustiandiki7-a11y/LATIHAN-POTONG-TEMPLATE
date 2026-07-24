<?php
include "connection.php";

$vbahasa  = $_POST['bahasa'];
$vflagimg = time() . ".jpg";

$path = "flag/";

// DIPERBAIKI: Tambahkan titik (.) untuk gabung string $path dan $vflagimg
move_uploaded_file($_FILES['flag']['tmp_name'], $path . $vflagimg);

// Sesuaikan nama tabel 'laguage' / 'language' dengan nama tabel di database kamu
$sql_insert = mysqli_query($koneksi, "
    INSERT INTO laguage
    (bahasa, flag)
    VALUES
    ('$vbahasa', '$vflagimg') 
"); // DIPERBAIKI: Variabel diubah dari $vflag ke $vflagimg

if ($sql_insert) {
    header("Location: table_laguage.php");
} 
?>