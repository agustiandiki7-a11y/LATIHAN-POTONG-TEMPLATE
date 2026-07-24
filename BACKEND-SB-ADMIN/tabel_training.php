<?php
include "connection.php";

$select_training = mysqli_query($koneksi, "SELECT * FROM training ORDER BY id_training DESC");

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
                        <h1 class="h3 mb-0 text-gray-800">Training</h1>
                    </div>

                    <!-- Button Add Training -->
                    <div class="mb-3">
                        <a href="form_training.php" class="btn btn-info">Add Training</a>
                    </div>

                    <!-- Table Training -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Training Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">Place</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($tampil = mysqli_fetch_object($select_training)) : ?>

                                <tr>
                                    <td><?= $tampil->nama_training ?></td>
                                    <td><?= $tampil->tahun_training ?></td>
                                    <td><?= $tampil->tempat_training ?></td>
                                    <td><?= $tampil->deskripsi ?></td>

                                    <td>
                                        <!-- Action Delete Training -->
                                        <a href="delete_training.php?id_training=<?= $tampil->id_training ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

                                        <!-- Action Update Training -->
                                        <a href="update_form_training.php?id_training=<?= $tampil->id_training ?>"
                                           class="btn btn-success btn-sm">
                                            Update
                                        </a>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>
                    </table>

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

    <!-- Scroll to Top Button / Scripts -->
    <?php include "buttom.php"; ?>

</body>