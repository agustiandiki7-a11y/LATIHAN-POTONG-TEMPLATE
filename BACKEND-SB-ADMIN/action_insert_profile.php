<?php
include "connection.php";

if (isset($_POST['submit'])) {

    $vnama = $_POST['nama'];
    $vdeskripsi = $_POST['about'];
    $vemail = $_POST['email'];
    $vaddress = $_POST['address'];
    $vlinkedin = $_POST['linkedin'];
    $vnationalty = $_POST['nationality'];

    // Karena website dan phone belum ada di form
    $vwebsite = "";
    $vphone = "";

    $sql = "INSERT INTO profile
            (nama, about, website, phone, email, address, linkedin, nationalty)
            VALUES
            ('$vnama', '$vdeskripsi', '$vwebsite', '$vphone',
             '$vemail', '$vaddress', '$vlinkedin', '$vnationalty')";

    $sql_insert = mysqli_query($koneksi, $sql);

    if ($sql_insert) {
        header("Location: tabel_profile.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }

} else {
    header("Location: form_profile.php");
    exit;
}
?>