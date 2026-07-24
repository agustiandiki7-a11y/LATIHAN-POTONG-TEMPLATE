<?php
include "connection.php";

// DIPERBAIKI: Menggunakan id_laguage
$select_language = mysqli_query($koneksi, "SELECT * FROM laguage ORDER BY id_laguage DESC");

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
                        <h1 class="h3 mb-0 text-gray-800">Language</h1>
                    </div>

                    <!-- Button Add Language -->
                    <div class="mb-3">
                        <!-- Cek nama file di atribut href ini -->
                        <a href="form_laguage.php" class="btn btn-info">Add</a>
                    </div>

                    <!-- Table Language -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Bahasa</th>
                                <th scope="col">Flag</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($tampil = mysqli_fetch_object($select_language)) : ?>

                                <tr>
                                    <td><?= $tampil->bahasa ?></td>
                                    <!-- DIUBAH: Menggunakan tag <img> untuk menampilkan gambar -->
                                    <td>
                                        <img src="flag/<?= $tampil->flag ?>" width="60" class="img-thumbnail" alt="Bendera">
                                    </td>

                                    <td>
                                        <!-- Action Delete Language (DIPERBAIKI: id_laguage) -->
                                        <a href="delete_laguage.php?id_laguage=<?= $tampil->id_laguage ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

                                        <!-- Action Update Language (DIPERBAIKI: id_laguage) -->
                                        <!-- Action Update Language -->
                                        <a href="update_form_sidebar_foto.php?id_laguage=<?= $tampil->id_laguage ?>" class="btn btn-success btn-sm">
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