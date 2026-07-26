<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul sidebar_foto dan terhubung dengan tabel `sidebar_foto` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// 1. Tangkap parameter ID dari URL tombol update di tabel
// Menerima id_sedebar_foto yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (!isset($_GET['id_sedebar_foto']) || empty($_GET['id_sedebar_foto'])) {
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_sidebar_foto.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_sidebar_foto.php");
    exit();
}

// Menerima id_sedebar_foto yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_sedebar_foto = mysqli_real_escape_string($koneksi, $_GET['id_sedebar_foto']);

// 2. Ambil data dari database
// Query SELECT mengambil data dari tabel `sidebar_foto`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$select_id = mysqli_query($koneksi, "SELECT * FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");

// 3. Mengubah hasil query menjadi objek $data
$data = mysqli_fetch_object($select_id);

if (!$data) {
    die("Data foto tidak ditemukan di database!");
}
?>

<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `sidebar_foto` pada database. -->
<body id="page-top">
    <div id="wrapper">
        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "topbar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Update Sidebar Foto</h1>

                    <!-- FORM UTAMA -->
                    <!-- Form ini mengirim semua input ke `action_update_sidebar_foto.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_sidebar_foto.php" method="POST" enctype="multipart/form-data">

                        <!-- Input hidden mengirimkan value ID secara rahasia -->
                        <!-- Input name="id_sedebar_foto" menerima id_sedebar_foto. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden" name="id_sedebar_foto" value="<?php echo $data->id_sedebar_foto; ?>">

                        <div class="form-group mb-3">
                            <label>Sidebar Foto</label>

                            <!-- Pratinjau Foto Lama jika ada -->
                            <div class="mb-2">
                                <?php if (!empty($data->sidebar_foto) && file_exists("sidebar_foto/" . $data->sidebar_foto)) : ?>
                                    <img src="sidebar_foto/<?php echo $data->sidebar_foto; ?>" width="120" class="img-thumbnail" alt="Foto Lama">
                                <?php endif; ?>
                            </div>

                            <!-- Input name="sidebar_foto" menerima sidebar_foto. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="file" name="sidebar_foto" class="form-control" accept="image/*" required>
                            <small class="text-muted">*Pilih file foto baru dari laptop kamu.</small>
                        </div>

                        <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                        <a href="tabel_sidebar_foto.php" class="btn btn-secondary">Batal</a>

                    </form>

                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <?php include "buttom.php"; ?>
</body>
