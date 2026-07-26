<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul profile dan terhubung dengan tabel `profile` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
// Menerima ID unik profile yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (empty($_GET['id_profile'])) { header("Location: tabel_profile.php"); exit; }
// Menerima ID unik profile yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_profile = mysqli_real_escape_string($koneksi, $_GET['id_profile']);
// Query SELECT mengambil data dari tabel `profile`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$q = mysqli_query($koneksi, "SELECT * FROM profile WHERE id_profile='$id_profile'");
// Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
$profile = mysqli_fetch_object($q);
if (!$profile) { die("Data profile tidak ditemukan."); }
?>
<?php include "header.php"; ?>
<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `profile` pada database. -->
<body id="page-top"><div id="wrapper"><?php include "sidebar.php"; ?>
<div id="content-wrapper" class="d-flex flex-column"><div id="content"><?php include "topbar.php"; ?>
<div class="container-fluid"><h1 class="h3 mb-4 text-gray-800">Update Profile</h1>
<!-- Form ini mengirim semua input ke `action_update_profile.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_profile.php" method="POST">
<!-- Input name="id_profile" menerima ID unik profile. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden" name="id_profile" value="<?= htmlspecialchars($profile->id_profile) ?>">
<?php
$fields=[
 ['nama','Nama','text'],['website','Website','text'],['phone','Phone','text'],['email','Email','email'],
 ['linkedin','LinkedIn','text'],['nationality','Nationality','text']
];
foreach($fields as $f){ $prop=$f[0]=='nationality'?'nationalty':$f[0]; ?>
<div class="mb-3"><label class="form-label"><?= $f[1] ?></label><input type="<?= $f[2] ?>" name="<?= $f[0] ?>" class="form-control" value="<?= htmlspecialchars($profile->$prop ?? '') ?>"></div>
<?php } ?>
<div class="mb-3"><label class="form-label">About</label><!-- Input name="about" menerima deskripsi/overview. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<textarea name="about" class="form-control" rows="4"><?= htmlspecialchars($profile->about ?? '') ?></textarea></div>
<div class="mb-3"><label class="form-label">Address</label><!-- Input name="address" menerima alamat. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<textarea name="address" class="form-control" rows="3"><?= htmlspecialchars($profile->address ?? '') ?></textarea></div>
<button type="submit" class="btn btn-primary">Update</button> <a href="tabel_profile.php" class="btn btn-secondary">Batal</a>
</form></div></div><?php include "footer.php"; ?></div></div><?php include "buttom.php"; ?></body></html>
