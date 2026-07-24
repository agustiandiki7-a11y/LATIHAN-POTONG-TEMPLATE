<?php
include "connection.php";
// Perintah SQL ambil data familiar
$select_familiar = mysqli_query($koneksi, "SELECT * FROM familiar ORDER BY id_familiar DESC");
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
                        <h1 class="h3 mb-0 text-gray-800">Familiar</h1>
                    </div>

                    <!-- Tombol ADD -->
                    <a href="form_familiar.php" class="btn btn-info mb-2">ADD</a>

                    <!-- Content Start -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($tampil = mysqli_fetch_object($select_familiar)): ?>
                                <tr>
                                    <!-- Menampilkan Nama -->
                                    <th scope="row"><?php echo $tampil->nama; ?></th>

                                    <!-- Menampilkan Icon / Gambar -->
                                    <td>
                                        <?php 
                                        // Cek apakah data icon berupa file gambar di folder foto/
                                        if (!empty($tampil->icon) && file_exists("foto/" . $tampil->icon)) : 
                                        ?>
                                            <img src="foto/<?php echo $tampil->icon; ?>" width="50" class="img-fluid" alt="Icon">
                                        <?php else : ?>
                                            <!-- Jika bukan file gambar, tampilkan sebagai class FontAwesome -->
                                            <i style="font-size:40px" class="<?php echo $tampil->icon; ?>"></i>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Action Button -->
                                    <td>
                                        <a href="delete_familiar.php?id_familiar=<?php echo $tampil->id_familiar; ?>" 
                                           class="btn btn-danger"
                                           onclick="return confirm('Confirm to delete?')">Delete</a>

                                        <a href="update_form_familiar.php?id_familiar=<?php echo $tampil->id_familiar; ?>"
                                           class="btn btn-success">
                                            Update
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
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
    <?php include "bottom.php"; ?>
</body>
</html>