<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul profile dan terhubung dengan tabel `profile` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Memastikan proses hanya dijalankan ketika data dikirim melalui form dengan method POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST['id_profile'])) { header("Location: tabel_profile.php"); exit; }
// Mengambil data ID unik profile dari input form yang memiliki name="id_profile".
$id=mysqli_real_escape_string($koneksi,$_POST['id_profile']);
// Mengambil data nama dari input form yang memiliki name="nama".
$nama=mysqli_real_escape_string($koneksi,$_POST['nama']??''); $about=mysqli_real_escape_string($koneksi,$_POST['about']??'');
// Mengambil data alamat website dari input form yang memiliki name="website".
$website=mysqli_real_escape_string($koneksi,$_POST['website']??''); $phone=mysqli_real_escape_string($koneksi,$_POST['phone']??'');
// Mengambil data alamat email dari input form yang memiliki name="email".
$email=mysqli_real_escape_string($koneksi,$_POST['email']??''); $address=mysqli_real_escape_string($koneksi,$_POST['address']??'');
// Mengambil data akun LinkedIn dari input form yang memiliki name="linkedin".
$linkedin=mysqli_real_escape_string($koneksi,$_POST['linkedin']??''); $nationalty=mysqli_real_escape_string($koneksi,$_POST['nationality']??'');
// Query UPDATE mengubah data lama di tabel `profile` berdasarkan ID yang dipilih dari halaman tabel.
$sql="UPDATE profile SET nama='$nama',about='$about',website='$website',phone='$phone',email='$email',address='$address',linkedin='$linkedin',nationalty='$nationalty' WHERE id_profile='$id'";
if(!mysqli_query($koneksi,$sql)){die("Data gagal diupdate: ".mysqli_error($koneksi));}
// Setelah proses selesai, pengguna diarahkan ke ` tabel_profile.php` agar hasil terbaru dapat dilihat.
header("Location: tabel_profile.php"); exit;
?>
