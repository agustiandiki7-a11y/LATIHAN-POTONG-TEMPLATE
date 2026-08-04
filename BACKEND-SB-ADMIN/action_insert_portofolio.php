<?php
// Koneksi database langsung di dalam file
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_portofolio";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$nama_file = $_FILES['gambar']['name'];
$tmp_file  = $_FILES['gambar']['tmp_name'];
$path      = "uploads/" . $nama_file;

if (move_uploaded_file($tmp_file, $path)) {
    $query = "INSERT INTO portofolio (judul, kategori, deskripsi, gambar) VALUES ('$judul', '$kategori', '$deskripsi', '$nama_file')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: tabel_portofolio.php?pesan=sukses_tambah");
    } else {
        echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
    }
} else {
    echo "Gagal mengupload gambar!";
}
?>