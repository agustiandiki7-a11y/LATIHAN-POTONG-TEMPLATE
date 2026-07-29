<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN: Form Tambah Data Tols -->
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
                    <h1 class="h3 mb-4 text-gray-800">Add Tols</h1>

                    <!-- Form Tambah Data Tols -->
                    <form action="action_insert_tols.php" method="POST">

                        <!-- Input Name -->
                        <div class="form-group mb-4">
                            <label class="text-secondary">Name</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <!-- Input Icon -->
                        <div class="form-group mb-4">
                            <label class="text-secondary">Icon</label>
                            <input type="text" name="icon" class="form-control" placeholder="e.g. fab fa-html5 / class icon" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary px-4 mt-2">Submit</button>

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