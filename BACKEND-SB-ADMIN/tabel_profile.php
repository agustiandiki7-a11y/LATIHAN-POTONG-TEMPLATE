<?php
// Memanggil file koneksi database
include "connection.php";

// Mengambil semua data dari tabel profile
$select_profile = mysqli_query($koneksi, "SELECT * FROM profile");

// Mengecek apakah query berhasil

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
                        <h1 class="h3 mb-0 text-gray-800">
                            Profile
                        </h1>
                    </div>

                    <!-- Tombol menuju halaman tambah profile -->
                    <a href="form_profile.php" class="btn btn-info mb-2">
                        Add
                    </a>

                    <!-- Membuat tabel profile -->
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Overview</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">LinkedIn</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <!-- Perulangan untuk menampilkan data profile -->
                                <?php while ($tampil = mysqli_fetch_object($select_profile)) : ?>

                                    <tr>

                                        <!-- Menampilkan data dari database -->
                                        <td>
                                            <?php echo $tampil->nama; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->about; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->website; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->phone; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->email; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->address; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->linkedin; ?>
                                        </td>
                                        <td>
                                            <?php echo $tampil->nationalty; ?>
                                        </td>

                                        <!-- Kolom tombol aksi -->
                                        <td>

                                            <!-- Tombol Delete -->
                                            <!-- Mengirim id_profile ke delete_profile.php -->
                                            <a href="delete_profile.php?id_profile=<?= $tampil->id_profile; ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <!-- Mengirim id_profile ke update_profile.php -->
                                            <!-- Tombol Update Profile yang Benar -->
                                            <a href="update_form_profile.php?id_profile=<?php echo $tampil->id_profile; ?>" class="btn btn-success btn-sm">
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