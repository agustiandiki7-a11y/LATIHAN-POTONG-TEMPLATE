<?php
include "connection.php";

$select_job = mysqli_query($koneksi, "  SELECT*FROM job ORDER BY id_job DESC");

?>
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
                        <h1 class="h3 mb-0 text-gray-800">training</h1>

                    </div>
                    <!--containT star-->
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

                            <?php while ($tampil = mysqli_fetch_object($select_job)) : ?>

                                <tr>
                                    <td><?= $tampil->nama_pekerjaan ?></td>
                                    <td><?= $tampil->tahun_pekerjaan ?></td>
                                    <td><?= $tampil->tempat_pekerjaan ?></td>
                                    <td><?= $tampil->deskripsi ?></td>

                                    <td>
                                        <a href="delete_job.php?id_job=<?= $tampil->id_job ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

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