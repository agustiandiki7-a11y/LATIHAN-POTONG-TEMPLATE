<?php
// Koneksi database langsung
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_portofolio"; // Sesuaikan nama database Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Cek apakah ID ada dikirim melalui POST
if (isset($_POST['id'])) {
    $id        = $_POST['id'];
    $judul     = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori  = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];

    // Jika user mengupload gambar baru
    if (!empty($nama_file)) {
        $path = "uploads/" . $nama_file;
        if (move_uploaded_file($tmp_file, $path)) {
            // Ambil gambar lama jika ingin dihapus (opsional), lalu update dengan gambar baru
            $query = "UPDATE portfolio SET judul='$judul', kategori='$kategori', deskripsi='$deskripsi', gambar='$nama_file' WHERE id='$id'";
        } else {
            echo "Gagal mengupload gambar baru!";
            exit;
        }
    } else {
        // Jika tidak ganti gambar, update data teksnya saja
        $query = "UPDATE portfolio SET judul='$judul', kategori='$kategori', deskripsi='$deskripsi' WHERE id='$id'";
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: tabel_portofolio.php?pesan=sukses_update");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>   