<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul training dan terhubung dengan tabel `training` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Query SELECT mengambil data dari tabel `training`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$select_training = mysqli_query($koneksi, "SELECT * FROM training ORDER BY id_training DESC");
if (!$select_training) {
    die("Query gagal: " . mysqli_error($koneksi));
}

?>
<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `training` pada database. -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Training</h1>
                    </div>

                    <!-- Button Add Training -->
                    <div class="mb-3">
                        <!-- Tombol Add membuka `form_training.php` agar pengguna dapat mengisi data baru sebelum disimpan ke database. -->
                        <a href="form_training.php" class="btn btn-info">Add </a>
                    </div>

                    <!-- Table Training -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Year</th>
                                <th scope="col">Place</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman. -->
                            <?php while ($tampil = mysqli_fetch_object($select_training)) : ?>

                                <tr>
                                    <!-- Kolom ini diisi dari field `nama_training` (nama training) pada tabel `training`. Data tersedia karena query SELECT di bagian atas halaman. -->
                                    <td><?= $tampil->nama_training ?></td>
                                    <!-- Kolom ini diisi dari field `tahun_training` (tahun training) pada tabel `training`. Data tersedia karena query SELECT di bagian atas halaman. -->
                                    <td><?= $tampil->tahun_training ?></td>
                                    <!-- Kolom ini diisi dari field `tempat_training` (tempat training) pada tabel `training`. Data tersedia karena query SELECT di bagian atas halaman. -->
                                    <td><?= $tampil->tempat_training ?></td>
                                    <!-- Kolom ini diisi dari field `deskripsi` (deskripsi) pada tabel `training`. Data tersedia karena query SELECT di bagian atas halaman. -->
                                    <td><?= $tampil->deskripsi ?></td>

                                    <td>
                                        <!-- Action Delete Training -->
                                        <a href="delete_training.php?id_training=<?= $tampil->id_training ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

                                        <!-- Action Update Training -->
                                        <!-- Tombol Update mengirim ID melalui URL ke `update_form_training.php`. Halaman tersebut memakai ID untuk mengambil data lama dari database. -->
                                        <a href="update_form_training.php?id_training=<?= $tampil->id_training ?>" class="btn btn-success btn-sm">
                                            Update
                                        </a>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>
                    </table>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button / Scripts -->
    <?php include "buttom.php"; ?>

</body>