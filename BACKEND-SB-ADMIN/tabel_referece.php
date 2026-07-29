<?php
// Memanggil file koneksi database
include "connection.php";

// Mengambil semua data dari tabel reference sesuai nama kolom id_reference
// Menggunakan id_reperence (pake p) sesuai nama kolom di phpMyAdmin kamu
$select_reference = mysqli_query($koneksi, "SELECT * FROM reference ORDER BY id_reperence DESC");
if (!$select_reference) {
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-3 text-gray-800">reference</h1>

                    <!-- Tombol Add -->
                    <div class="mb-3">
                        <a href="form_reference.php" class="btn btn-info px-4">Add</a>
                    </div>

                    <!-- Tabel Reference -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr class="text-secondary">
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Perusahaan</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <?php while ($tampil = mysqli_fetch_object($select_reference)) : ?>

                                    <tr>
                                        <td><?php echo htmlspecialchars($tampil->nama); ?></td>
                                        <td><?php echo htmlspecialchars($tampil->jabatan); ?></td>
                                        <td><?php echo htmlspecialchars($tampil->perusahaan); ?></td>
                                        <td><?php echo htmlspecialchars($tampil->phone); ?></td>
                                        <td><?php echo htmlspecialchars($tampil->email); ?></td>
                                        <td>
                                            <!-- Tombol Delete -->
                                            <a href="delete_reference.php?id=<?php echo $tampil->id_reperence; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <a href="update_form_reference.php?id=<?php echo $tampil->id_reperence; ?>" class="btn btn-success btn-sm">
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