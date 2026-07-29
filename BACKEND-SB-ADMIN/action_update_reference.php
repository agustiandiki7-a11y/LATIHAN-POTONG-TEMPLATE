<?php
include "connection.php";

$id_reperence = $_POST['id_reperence'];
$nama         = $_POST['nama'];
$jabatan      = $_POST['jabatan'];
$perusahaan   = $_POST['perusahaan'];
$phone        = $_POST['phone'];
$email        = $_POST['email'];

$query = "UPDATE reference SET nama = '$nama', jabatan = '$jabatan', perusahaan = '$perusahaan', phone = '$phone', email = '$email' WHERE id_reperence = '$id_reperence'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_referece.php");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($koneksi);
}
?>