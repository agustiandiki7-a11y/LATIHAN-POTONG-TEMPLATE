<?php
// Memanggil file koneksi database
include "connection.php";
session_start();
if ($_SESSION['status'] !="login"){
    header("location:login.php?pesan=belum_login");
}

// Mengambil semua data dari tabel tols
$select_tols = mysqli_query($koneksi, "SELECT * FROM tols ORDER BY id_tols DESC");
if (!$select_tols) { 
    die("Query gagal: " . mysqli_error($koneksi)); 
}
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

                    <!-- Page Heading / Judul Halaman -->
                    <h1 class="h3 mb-3 text-gray-800">tols</h1>

                    <!-- Tombol Add -->
                    <div class="mb-3">
                        <a href="form_tols.php" class="btn btn-info px-4">Add</a>
                    </div>

                    <!-- Tabel Tols -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr class="text-secondary">
                                    <th scope="col">name</th>
                                    <th scope="col">icon</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <!-- Perulangan untuk menampilkan data tols -->
                                <?php while ($tampil = mysqli_fetch_object($select_tols)) : ?>

                                    <tr>
                                        <!-- Menampilkan nama -->
                                        <td>
                                            <?php echo htmlspecialchars($tampil->nama); ?>
                                        </td>

                                        <!-- Menampilkan HANYA ICON -->
                                        <td>
                                            <i class="<?php echo htmlspecialchars($tampil->icon); ?> fa-2x"></i>
                                        </td>

                                        <!-- Kolom tombol aksi -->
                                        <td>
                                            <!-- Tombol Delete -->
                                            <a href="delete_tols.php?id=<?php echo $tampil->id_tols; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <a href="update_form_tols.php?id=<?php echo $tampil->id_tols; ?>" class="btn btn-success btn-sm">
                                                Update
                                            </a>
                                        </td>
                                    </tr>

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