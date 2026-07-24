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
                        <h1 class="h3 mb-0 text-gray-800">Job</h1>

                    </div>
                    <!--containT star-->
                    <form action="action_insert_job.php" method="POST">

                        <div class="mb-3">
                            <label for="job" class="form-label">Profession</label>
                            <input
                                type="text"
                                class="form-control"
                                id="job"
                                name="nama_pekerjaan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input
                                type="text"
                                class="form-control"
                                id="year"
                                name="tahun_pekerjaan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="place" class="form-label">Place</label>
                            <input
                                type="text"
                                class="form-control"
                                id="place"
                                name="tempat_pekerjaan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">
                                Responsibilities
                            </label>

                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                class="form-control"
                                rows="10"
                                required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>

                    </form>

                    <!--CONTAINT END-->

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