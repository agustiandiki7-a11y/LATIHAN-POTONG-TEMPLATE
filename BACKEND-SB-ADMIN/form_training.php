<?php include "header.php" ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Add Training</h1>
                    </div>

                    <!-- Content Start -->
                    <form action="action_insert_training.php" method="post">
                        
                        <div class="mb-3">
                            <label for="nama_training" class="form-label">Subject / Training Name</label>
                            <input type="text" class="form-control" id="nama_training" name="nama_training" required>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_training" class="form-label">Year</label>
                            <input type="text" class="form-control" id="tahun_training" name="tahun_training" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_training" class="form-label">Place</label>
                            <input type="text" class="form-control" id="tempat_training" name="tempat_training" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Description / Responsibilities</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" class="form-control" rows="10" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                    <!-- Content End -->

                </div>
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

    <!-- Scroll to Top Button / Scripts -->
    <?php include "buttom.php" ?>

</body>

</html>