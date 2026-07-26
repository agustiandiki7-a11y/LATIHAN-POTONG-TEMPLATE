<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul education dan terhubung dengan tabel `education` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Menerima ID unik pendidikan yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id = $_GET['id_education'];

// Query SELECT mengambil data dari tabel `education`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$query = mysqli_query($koneksi, "SELECT * FROM education WHERE id_education='$id'");
// Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
$data = mysqli_fetch_assoc($query);
?>

<?php include "header.php" ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `education` pada database. -->
<body id="page-top">

<div id="wrapper">

<?php include "sidebar.php" ?>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">

<?php include "topbar.php" ?>

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Update Education</h1>

<!-- Form ini mengirim semua input ke `action_update_education.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_education.php" method="POST">
    
    <!-- Input name="id_education" menerima ID unik pendidikan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden" name="id_education" value="<?php echo $data['id_education']; ?>">

    <div class="form-group">
        <label>Major</label>
        <!-- Input name="nama_jurusan" menerima nama_jurusan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text" name="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan']; ?>">
    </div>

    <div class="form-group">
        <label>Year</label>
        <!-- Input name="tahun_belajar" menerima tahun_belajar. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text" name="tahun_belajar" class="form-control" value="<?php echo $data['tahun_belajar']; ?>">
    </div>

    <div class="form-group">
        <label>Place</label>
        <!-- Input name="temapat_belajar" menerima temapat_belajar. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text" name="temapat_belajar" class="form-control" value="<?php echo $data['temapat_belajar']; ?>">
    </div>

    <div class="form-group">
        <label>Description</label>
        <!-- Input name="deskripsi" menerima deskripsi. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<textarea name="deskripsi" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">UPDATE</button>
</form>

</div>

</div>
</div>
</div>

<?php include "footer.php" ?>
<?php include "bottom.php" ?>
