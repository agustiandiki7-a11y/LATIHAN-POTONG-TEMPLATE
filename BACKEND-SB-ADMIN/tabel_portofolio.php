<?php
// Memanggil file koneksi database
include "connection.php";

// Mengambil semua data dari tabel portofolio
$select_portofolio = mysqli_query($koneksi, "SELECT * FROM portofolio ORDER BY id_portofolio DESC");

?>

<?php include "header.php"; ?>

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
                        <h1 class="h3 mb-0 text-gray-800">
                            Portofolio
                        </h1>
                    </div>

                    <!-- Tombol menuju halaman tambah portofolio -->
                    <a href="form_portofolio.php" class="btn btn-info mb-2">
                        Add
                    </a>

                    <!-- Membuat tabel portofolio -->
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr>
                                    <th scope="col">Portofolio</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Img</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <!-- Perulangan untuk menampilkan data portofolio -->
                                <?php while ($tampil = mysqli_fetch_object($select_portofolio)) : ?>

                                    <tr>

                                        <!-- Menampilkan data sesuai nama kolom phpMyAdmin -->
                                        <td>
                                            <?php echo $tampil->judul_portofolio; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->link; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->deskripsi; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->img; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->jenis; ?>
                                        </td>

                                        <!-- Kolom tombol aksi -->
                                        <td>

                                            <!-- Tombol Delete -->
                                            <a href="delete_portofolio.php?id_portofolio=<?= $tampil->id_portofolio; ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <a href="update_form_portofolio.php?id_portofolio=<?php echo $tampil->id_portofolio; ?>"
                                                class="btn btn-success">
                                                Update
                                            </a>

                                        </td>

                                    </tr>

                                    <!-- Mengakhiri perulangan -->
                                <?php endwhile; ?>

                            </tbody>

                        </table>

                    </div>
                    <!-- End Table Responsive -->

                </div>
                <!-- End Container Fluid -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- End Footer -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll to Top Button -->
    <?php include "buttom.php"; ?>

</body>

</html>