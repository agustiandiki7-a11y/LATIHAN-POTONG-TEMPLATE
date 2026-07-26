<?php include "connection.php";
// KETERANGAN ALUR DATA: File ini merupakan bagian modul familiar dan terhubung dengan tabel `familiar` di database.


// Mengambil data nama dari input form yang memiliki name="nama".
$vnama=$_POST['nama'];
// Mengambil data icon dari input form yang memiliki name="icon".
$vicon = $_POST['icon'];

// Query INSERT menyimpan data yang berasal dari form ke tabel `familiar` di database.
$sql_insert = mysqli_query($koneksi,"INSERT INTO familiar(nama,icon)values ('$vnama','$vicon')");
// Setelah proses selesai, pengguna diarahkan ke `tabel_familiar.php` agar hasil terbaru dapat dilihat.
header("location:tabel_familiar.php");
