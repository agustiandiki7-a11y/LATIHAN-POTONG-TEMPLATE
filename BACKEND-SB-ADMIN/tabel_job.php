<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul job dan terhubung dengan tabel `job` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
session_start();
if ($_SESSION['status'] !="login"){
    header("location:login.php?pesan=belum_login");
}

$select_job = mysqli_query($koneksi, "  SELECT*FROM job ORDER BY id_job DESC");
if (!$select_job) { die("Query gagal: " . mysqli_error($koneksi)); }

?>
<?php include "header.php" ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `job` pada database. -->
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">training</h1>

                    </div>
                    <!--containT star-->
                    <!-- Tombol Add membuka `form_job.php` agar pengguna dapat mengisi data baru sebelum disimpan ke database. -->
<a href="form_job.php" class=" btn btn-info"> Add</a>
                    <!--CONTAINT END-->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">profession</th>
                                <th scope="col">Year</th>
                                <th scope="col">Place</th>
                                <th scope="col">responsibilities</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman. -->
                            <?php while ($tampil = mysqli_fetch_object($select_job)) : ?>

                                <tr>
                                    <!-- Kolom ini diisi dari field `nama_pekerjaan` (nama pekerjaan) pada tabel `job`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td><?= $tampil->nama_pekerjaan ?></td>
                                    <!-- Kolom ini diisi dari field `tahun_pekerjaan` (tahun pekerjaan) pada tabel `job`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td><?= $tampil->tahun_pekerjaan ?></td>
                                    <!-- Kolom ini diisi dari field `tempat_pekerjaan` (tempat pekerjaan) pada tabel `job`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td><?= $tampil->tempat_pekerjaan ?></td>
                                    <!-- Kolom ini diisi dari field `deskripsi` (deskripsi) pada tabel `job`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td><?= $tampil->deskripsi ?></td>

                                    <td>
                                        <!-- Tombol Delete mengirim ID melalui URL ke `delete_job.php`. ID itu dipakai untuk menentukan data database yang dihapus. -->
<a href="delete_job.php?id_job=<?= $tampil->id_job ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

                                        <!-- Tombol Update mengirim ID melalui URL ke `update_form_job.php`. Halaman tersebut memakai ID untuk mengambil data lama dari database. -->
<a href="update_form_job.php?id_job=<?= $tampil->id_job ?>"
                                            class="btn btn-success">
                                            Update
                                        </a>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>
                    </table>

                    <!-- Content fluid -->

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include "footer.php" ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <?php include "buttom.php" ?>

        <!-- Logout Modal-->


</body>
