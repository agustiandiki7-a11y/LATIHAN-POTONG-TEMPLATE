<?php
// Tampilkan semua error PHP jika ada yang bermasalah
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "connection.php";
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
                        <h1 class="h3 mb-0 text-gray-800">Add Language</h1>
                    </div>

                    <!-- Content Start -->
                    <!-- WAJIB tambahkan enctype="multipart/form-data" -->
                    <form action="action_insert_laguage.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group mb-3">
                            <label>Bahasa</label>
                            <input type="text" name="bahasa" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Flag (Gambar Bendera)</label>
                            <input type="file" name="flag" class="form-control" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <!-- Content End -->

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

    <!-- Scroll to Top Button-->
    <?php include "buttom.php"; ?>

</body>

</html>