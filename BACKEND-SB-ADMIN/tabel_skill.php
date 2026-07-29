<?php
// Memanggil file koneksi database
include "connection.php";

// Mengambil semua data dari tabel `sekill`
$select_skill = mysqli_query($koneksi, "SELECT * FROM sekill ORDER BY id_skill DESC");
if (!$select_skill) { 
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
                    <h1 class="h3 mb-3 text-gray-800">skill</h1>

                    <!-- Tombol Add -->
                    <div class="mb-3">
                        <a href="form_sekill.php" class="btn btn-info px-4">Add</a>
                    </div>

                    <!-- Tabel Skill -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr class="text-secondary">
                                    <th scope="col">nama_skill</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <?php while ($tampil = mysqli_fetch_object($select_skill)) : ?>

                                    <tr>
                                        <!-- Menampilkan nama skill -->
                                        <td>
                                            <?php echo htmlspecialchars($tampil->nama_skill); ?>
                                        </td>

                                        <!-- Kolom tombol aksi -->
                                        <td>
                                            <!-- Tombol Delete -->
                                            <a href="delete_skill.php?id=<?php echo $tampil->id_skill; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus skill ini?');">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <a href="update_form_sekill.php?id=<?php echo $tampil->id_skill; ?>" class="btn btn-success btn-sm">
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