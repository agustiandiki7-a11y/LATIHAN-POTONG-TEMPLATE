<?php
include "connection.php";

$nama       = $_POST['nama'];
$jabatan    = $_POST['jabatan'];
$perusahaan = $_POST['perusahaan'];
$phone      = $_POST['phone'];
$email      = $_POST['email'];

$query = "INSERT INTO reference (nama, jabatan, perusahaan, phone, email) VALUES ('$nama', '$jabatan', '$perusahaan', '$phone', '$email')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: tabel_referece.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>