<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul job dan terhubung dengan tabel `job` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Menerima ID unik pekerjaan yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_job = $_GET['id_job'];

$select_id = mysqli_query($koneksi, "
    // Query SELECT mengambil data dari tabel `job`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
    SELECT * FROM job 
    WHERE id_job = '$id_job'
");

// Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
$job = mysqli_fetch_object($select_id);
?>

<?php include "header.php" ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `job` pada database. -->
<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php" ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php" ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Job</h1>
                    </div>

                    <!-- Form ini mengirim semua input ke `action_update_job.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_job.php" method="post">

                        <!-- Input name="id_job" menerima ID unik pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden"
                            name="id_job"
                            value="<?php echo $job->id_training ?>">

                        <div class="mb-3">
                            <label class="form-label">Profession</label>

                            <!-- Input name="nama_pekerjaan" menerima nama pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text"
                                class="form-control"
                                name="nama_pekerjaan"
                                value="<?php echo $job->nama_pekerjaan ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year</label>

                            <!-- Input name="tahun_pekerjaan" menerima tahun pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text"
                                class="form-control"
                                name="tahun_pekerjaan"
                                value="<?php echo $job->tahun_training ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Place</label>

                            <!-- Input name="tempat_pekerjaan" menerima tempat pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text"
                                class="form-control"
                                name="tempat_pekerjaan"
                                value="<?php echo $job->tempat_training ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Responsibilities</label>

                            <!-- Input name="deskripsi" menerima deskripsi. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<textarea name="deskripsi"
                                class="form-control"
                                rows="10"><?php echo $job->deskripsi ?></textarea>
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
