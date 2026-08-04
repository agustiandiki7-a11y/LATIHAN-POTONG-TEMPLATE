<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul sidebar_foto dan terhubung dengan tabel `sidebar_foto` di database.

// Memanggil file koneksi database
// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
session_start();
if ($_SESSION['status'] !="login"){
    header("location:login.php?pesan=belum_login");
}

// Mengambil semua data dari tabel sidebar_foto
// Query SELECT mengambil data dari tabel `sidebar_foto`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$select_sidebar_foto = mysqli_query($koneksi, "SELECT * FROM sidebar_foto ORDER BY id_sedebar_foto DESC");
?>

<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `sidebar_foto` pada database. -->
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
                    <!-- Tombol Add membuka `form_sidebar_foto.php` agar pengguna dapat mengisi data baru sebelum disimpan ke database. -->
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
                                // Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
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
                                            <!-- Tombol Delete mengirim ID melalui URL ke `delete_sidebar_foto.php`. ID itu dipakai untuk menentukan data database yang dihapus. -->
<a href="delete_sidebar_foto.php?id_sedebar_foto=<?= $tampil->id_sedebar_foto; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <!-- Tombol Update mengirim ID melalui URL ke `update_form_sidebar_foto.php`. Halaman tersebut memakai ID untuk mengambil data lama dari database. -->
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
