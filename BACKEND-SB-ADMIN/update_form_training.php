<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul training dan terhubung dengan tabel `training` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Menerima ID unik training yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_training = $_GET['id_training'] ?? null;

// Pastikan di sini: FROM training (BUKAN FROM job)
$select_training = mysqli_query($koneksi, "
    // Query SELECT mengambil data dari tabel `training`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
    SELECT * FROM training WHERE id_training = '$id_training'
");

// Pastikan variabelnya disimpen ke $training
// Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
$training = mysqli_fetch_object($select_training);
?>
?>

<?php include "header.php" ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `training` pada database. -->
<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php" ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php" ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">training</h1>
                    </div>

                    <!-- Form ini mengirim semua input ke `action_update_training.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_training.php" method="post">

                        <!-- Input name="id_training" menerima ID unik training. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden"
                            name="id_training"
                            value="<?php echo $training->id_training; ?>">

                        <div class="mb-3">
                            <label class="form-label">Training</label>

                            <!-- Input name="nama_training" menerima nama training. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text"
                                class="form-control"
                                name="nama_training"
                                value="<?php echo $training->nama_training; ?>">
                        </div>

                        <!-- Input Year -->
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <!-- Input name="tahun_training" menerima tahun training. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text" class="form-control" name="tahun_training" required>
                        </div>

                        <!-- Input Place -->
                        <div class="mb-3">
                            <label class="form-label">Place</label>
                            <!-- Input name="tempat_training" menerima tempat training. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text" class="form-control" name="tempat_training" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>

                            <!-- Input name="deskripsi" menerima deskripsi. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<textarea name="deskripsi"
                                class="form-control"
                                rows="10"><?php echo $training->deskripsi; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                    </form>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "buttom.php" ?>

</body>
