<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul portofolio dan terhubung dengan tabel `portofolio` di database.

// Memanggil file koneksi database
// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil semua data dari tabel portofolio
// Query SELECT mengambil data dari tabel `portofolio`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$select_portofolio = mysqli_query($koneksi, "SELECT * FROM portofolio ORDER BY id_portofolio DESC");
if (!$select_portofolio) { die("Query gagal: " . mysqli_error($koneksi)); }

?>

<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `portofolio` pada database. -->
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
                            Portofolio
                        </h1>
                    </div>

                    <!-- Tombol menuju halaman tambah portofolio -->
                    <!-- Tombol Add membuka `form_portofolio.php` agar pengguna dapat mengisi data baru sebelum disimpan ke database. -->
<a href="form_portofolio.php" class="btn btn-info mb-2">
                        Add
                    </a>

                    <!-- Membuat tabel portofolio -->
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">

                            <!-- Kepala tabel -->
                            <thead>
                                <tr>
                                    <th scope="col">Portofolio</th>
                                    <th scope="col">Img</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <!-- Isi tabel -->
                            <tbody>

                                <!-- Perulangan untuk menampilkan data portofolio -->
                                <!-- Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman. -->
                                <?php while ($tampil = mysqli_fetch_object($select_portofolio)) : ?>

                                    <tr>

                                        <!-- Menampilkan data sesuai nama kolom phpMyAdmin -->
                                        <!-- Kolom ini diisi dari field `judul_portofolio` (judul_portofolio) pada tabel `portofolio`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td>
                                            <?php echo $tampil->judul_portofolio; ?>
                                        </td>
                                        
                                        <!-- KOLOM GAMBAR (SUDAH DIPERBAIKI) -->
                                        <td>
                                            <?php if (!empty($tampil->img) && file_exists("foto/" . $tampil->img)) : ?>
                                                <img src="foto/<?php echo $tampil->img; ?>" width="100" class="img-thumbnail" alt="Portofolio">
                                            <?php else : ?>
                                                <small class="text-danger">Gambar tidak ditemukan (<?= $tampil->img; ?>)</small>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo $tampil->link; ?>" target="_blank">
                                                <?php echo $tampil->link; ?>
                                            </a>
                                        </td>
                                        <!-- Kolom ini diisi dari field `deskripsi` (deskripsi) pada tabel `portofolio`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td>
                                            <?php echo $tampil->deskripsi; ?>
                                        </td>
                                        <!-- Kolom ini diisi dari field `jenis` (jenis) pada tabel `portofolio`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td>
                                            <?php echo $tampil->jenis; ?>
                                        </td>

                                        <!-- Kolom tombol aksi -->
                                        <td>

                                            <!-- Tombol Delete -->
                                            <!-- Tombol Delete mengirim ID melalui URL ke `delete_portofolio.php`. ID itu dipakai untuk menentukan data database yang dihapus. -->
<a href="delete_portofolio.php?id_portofolio=<?= $tampil->id_portofolio; ?>"
                                                class="btn btn-danger btn-sm mb-1"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <!-- Tombol Update mengirim ID melalui URL ke `update_form_portofolio.php`. Halaman tersebut memakai ID untuk mengambil data lama dari database. -->
<a href="update_form_portofolio.php?id_portofolio=<?php echo $tampil->id_portofolio; ?>"
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
