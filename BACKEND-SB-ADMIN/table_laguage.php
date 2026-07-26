<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul laguage dan terhubung dengan tabel `laguage` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// DIPERBAIKI: Menggunakan id_laguage
// Query SELECT mengambil data dari tabel `laguage`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
$select_id_laguage = mysqli_query($koneksi, "
SELECT * FROM laguage
ORDER BY id_language DESC
");

if (!$select_id_laguage) {
    die("Query gagal: " . mysqli_error($koneksi));
}

?>
<?php include "header.php"; ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `laguage` pada database. -->
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
                        <!-- Tombol Add membuka `form_laguage.php` agar pengguna dapat mengisi data baru sebelum disimpan ke database. -->
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

                            <!-- Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman. -->
                            <?php while ($tampil = mysqli_fetch_object($select_id_laguage)) : ?>

                                <tr>
                                    <!-- Kolom ini diisi dari field `bahasa` (bahasa) pada tabel `laguage`. Data tersedia karena query SELECT di bagian atas halaman. -->
<td><?= $tampil->bahasa ?></td>
                                    <!-- DIUBAH: Menggunakan tag <img> untuk menampilkan gambar -->
                                    <td>
                                        <img src="flag/<?= $tampil->flag ?>" width="60" class="img-thumbnail" alt="Bendera">
                                    </td>

                                    <td>
                                        <!-- Action Delete Language (DIPERBAIKI: id_laguage) -->
                                        <!-- Tombol Delete mengirim ID melalui URL ke `delete_laguage.php`. ID itu dipakai untuk menentukan data database yang dihapus. -->
<a href="delete_laguage.php?id_laguage=<?= $tampil->id_laguage ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

                                        <!-- Action Update Language (DIPERBAIKI: id_laguage) -->
                                        <!-- Action Update Language -->
                                        <!-- Tombol Update mengirim ID melalui URL ke `update_form_laguage.php`. Halaman tersebut memakai ID untuk mengambil data lama dari database. -->
<a href="update_form_laguage.php?id_laguage=<?= $tampil->id_laguage ?>" class="btn btn-success btn-sm">
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
