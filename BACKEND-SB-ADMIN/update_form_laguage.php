<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul laguage dan terhubung dengan tabel `laguage` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengecek apakah id_laguage ada di URL
// Menerima ID unik bahasa yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (!isset($_GET['id_laguage']) || empty($_GET['id_laguage'])) {
    // Setelah proses selesai, pengguna diarahkan ke ` table_laguage.php` agar hasil terbaru dapat dilihat.
    header("Location: table_laguage.php");
    exit;
}

// Menerima ID unik bahasa yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_laguage = mysqli_real_escape_string($koneksi, $_GET['id_laguage']);

// Query mengambil data dari tabel laguage
// Query SELECT mengambil data dari tabel `laguage`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$select_id = mysqli_query($koneksi, "SELECT * FROM laguage WHERE id_laguage='$id_laguage'");
// Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
$laguage   = mysqli_fetch_object($select_id);

if (!$laguage) {
    die("Data language tidak ditemukan");
}
?>

<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `laguage` pada database. -->
<body id="page-top">
    <div id="wrapper">
        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "topbar.php"; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Update Language</h1>

                    <!-- WAJIB menggunakan enctype="multipart/form-data" -->
                    <!-- Form ini mengirim semua input ke `action_update_laguage.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_laguage.php" method="POST" enctype="multipart/form-data">

                        <!-- Hidden ID -->
                        <!-- Input name="id_laguage" menerima ID unik bahasa. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden" name="id_laguage" value="<?php echo $laguage->id_laguage; ?>">

                        <!-- Input Bahasa -->
                        <div class="form-group mb-3">
                            <label>Bahasa</label>
                            <!-- Input name="bahasa" menerima bahasa. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text" name="bahasa" class="form-control" value="<?php echo htmlspecialchars($laguage->bahasa); ?>" required>
                        </div>

                        <!-- Input Gambar Bendera -->
                        <div class="form-group mb-3">
                            <label>Flag (Gambar Bendera)</label>

                            <!-- Pratinjau Gambar Lama -->
                            <div class="mb-2">
                                <?php if (!empty($laguage->flag) && file_exists("flag/" . $laguage->flag)) : ?>
                                    <img src="flag/<?php echo $laguage->flag; ?>" width="80" class="img-thumbnail" alt="Flag">
                                <?php else : ?>
                                    <small class="text-muted d-block">Belum ada gambar</small>
                                <?php endif; ?>
                            </div>

                            <!-- Input name="flag" menerima flag. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="file" name="flag" class="form-control" accept="image/*">
                            <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah gambar bendera.</small>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="table_laguage.php" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <?php include "buttom.php"; ?>
</body>
