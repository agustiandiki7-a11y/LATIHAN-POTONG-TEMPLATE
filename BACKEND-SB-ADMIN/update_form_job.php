<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul job dan terhubung dengan tabel `job` di database.

include "connection.php";

// Pengecekan ID unik pekerjaan dari URL
if (!isset($_GET['id_job']) || empty($_GET['id_job'])) {
    header("Location: tabel_job.php");
    exit();
}

$id_job = mysqli_real_escape_string($koneksi, $_GET['id_job']);

$select_id = mysqli_query($koneksi, "
    SELECT * FROM job 
    WHERE id_job = '$id_job'
");

// Mengambil satu baris hasil query agar setiap field database dapat dipanggil
$job = mysqli_fetch_object($select_id);

if (!$job) {
    echo "<script>alert('Data job tidak ditemukan!'); window.location.href='tabel_job.php';</script>";
    exit();
}
?>

<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `job` pada database. -->
<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php"; ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Job</h1>
                    </div>

                    <form action="action_update_job.php" method="post">

                        <!-- DIPERBAIKI: Menggunakan $job->id_job (Bukan id_training) -->
                        <input type="hidden"
                               name="id_job"
                               value="<?php echo $job->id_job; ?>">

                        <div class="mb-3">
                            <label class="form-label">Profession</label>
                            <input type="text"
                                   class="form-control"
                                   name="nama_pekerjaan"
                                   value="<?php echo htmlspecialchars($job->nama_pekerjaan ?? $job->job ?? ''); ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <!-- DIPERBAIKI (Baris 66): Menggunakan nama_kolom job (Bukan tahun_training) -->
                            <input type="text"
                                   class="form-control"
                                   name="tahun_pekerjaan"
                                   value="<?php echo htmlspecialchars($job->tahun_pekerjaan ?? $job->tahun_job ?? $job->tahun ?? ''); ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Place</label>
                            <!-- DIPERBAIKI (Baris 77): Menggunakan nama_kolom job (Bukan tempat_training) -->
                            <input type="text"
                                   class="form-control"
                                   name="tempat_pekerjaan"
                                   value="<?php echo htmlspecialchars($job->tempat_pekerjaan ?? $job->tempat_job ?? $job->tempat ?? ''); ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Responsibilities</label>
                            <textarea name="deskripsi"
                                      class="form-control"
                                      rows="10"
                                      required><?php echo htmlspecialchars($job->deskripsi ?? $job->description ?? ''); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                        
                        <a href="tabel_job.php" class="btn btn-secondary">
                            Batal
                        </a>

                    </form>

                </div>

            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>
</html>