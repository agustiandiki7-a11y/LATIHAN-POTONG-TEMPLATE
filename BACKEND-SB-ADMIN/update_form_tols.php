<?php
// Memanggil koneksi database
include "connection.php";

// Mengambil ID dari URL
$id = $_GET['id'];

// Query data berdasarkan id_tols
$query = mysqli_query($koneksi, "SELECT * FROM tols WHERE id_tols = '$id'");
$data = mysqli_fetch_object($query);
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
                    <h1 class="h3 mb-4 text-gray-800">Update Tols</h1>

                    <!-- Form Update Data Tols -->
                    <form action="action_update_tols.php" method="POST">

                        <!-- Hidden Input ID -->
                        <input type="hidden" name="id_tols" value="<?php echo $data->id_tols; ?>">

                        <!-- Input Name -->
                        <div class="form-group mb-4">
                            <label class="text-secondary">Name</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data->nama); ?>" required>
                        </div>

                        <!-- Input Icon -->
                        <div class="form-group mb-4">
                            <label class="text-secondary">Icon</label>
                            <input type="text" name="icon" class="form-control" value="<?php echo htmlspecialchars($data->icon); ?>" required>
                        </div>

                        <!-- Tombol Submit Update -->
                        <button type="submit" class="btn btn-success px-4 mt-2">Update</button>

                    </form>

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