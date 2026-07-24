<?php
// Memanggil file koneksi database
include "connection.php";

// Mengambil semua data dari tabel sidebar_foto
$select_sidebar_foto = mysqli_query($koneksi, "SELECT * FROM sidebar_foto ORDER BY id_sedebar_foto DESC");
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
                        <h1 class="h3 mb-0 text-gray-800">Sidebar Foto</h1>
                    </div>

                    <!-- Tombol menuju halaman tambah sidebar foto -->
                    <a href="form_sidebar_foto.php" class="btn btn-info mb-3">
                        Add
                    </a>

                    <!-- Membuat tabel sidebar foto -->
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">No</th>
                                    <th scope="col">Foto Sidebar</th>
                                    <th scope="col" width="20%">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <!-- Perulangan untuk menampilkan data sidebar_foto -->
                                <?php 
                                $no = 1;
                                while ($tampil = mysqli_fetch_object($select_sidebar_foto)) : 
                                ?>

                                    <tr>
                                        <!-- Nomor -->
                                        <td><?php echo $no++; ?></td>

                                        <!-- Menampilkan Gambar Sidebar Foto -->
                                        <td>
                                            <?php 
                                            $foto = $tampil->sidebar_foto;

                                            // Cek lokasi folder foto
                                            if (!empty($foto) && file_exists("foto/" . $foto)) : 
                                            ?>
                                                <img src="foto/<?= $foto; ?>" width="120" class="img-thumbnail" alt="Sidebar Foto">
                                            <?php elseif (!empty($foto) && file_exists("sidebar_foto/" . $foto)) : ?>
                                                <img src="sidebar_foto/<?= $foto; ?>" width="120" class="img-thumbnail" alt="Sidebar Foto">
                                            <?php else : ?>
                                                <small class="text-danger d-block">Gambar tidak ditemukan (<?= $foto; ?>)</small>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Kolom tombol aksi -->
                                        <td>

                                            <!-- Tombol Delete -->
                                            <a href="delete_sidebar_foto.php?id_sedebar_foto=<?= $tampil->id_sedebar_foto; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <a href="update_form_sidebar_foto.php?id_sedebar_foto=<?php echo $tampil->id_sedebar_foto; ?>"
                                                class="btn btn-success btn-sm">
                                                Update
                                            </a>

                                        </td>

                                    </tr>

                                <!-- Mengakhiri perulangan -->
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