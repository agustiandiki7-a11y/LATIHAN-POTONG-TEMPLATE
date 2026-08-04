<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul education dan terhubung dengan tabel `education` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";
session_start();
if ($_SESSION['status'] !="login"){
    header("location:login.php?pesan=belum_login");
}

$select_education = mysqli_query($koneksi, "
    SELECT * FROM education
    ORDER BY 1 DESC
");
if (!$select_education) { die("Query gagal: " . mysqli_error($koneksi)); }

if (!$select_education) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<?php include "header.php" ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `education` pada database. -->
<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php" ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php" ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            EDUCATION
                        </h1>
                    </div>

                    <!-- Tombol Add membuka `form_education.php` agar pengguna dapat mengisi data baru sebelum disimpan ke database. -->
<a href="form_education.php"
                        class="btn btn-info mb-3">
                        Add
                    </a>

                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>Major</th>
                                <th>Year</th>
                                <th>Place</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <!-- Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman. -->
                            <?php while ($tampil = mysqli_fetch_object($select_education)): ?>

                                <tr>
                                    <td><?= htmlspecialchars($tampil->nama_jurusan) ?></td>

                                    <td><?= htmlspecialchars($tampil->tahun_belajar) ?></td>

                                    <td><?= htmlspecialchars($tampil->temapat_belajar) ?></td>

                                    <td><?= htmlspecialchars($tampil->deskripsi) ?></td>

                                    <td>
                                        <!-- Tombol Update mengirim ID melalui URL ke `update_form_education.php`. Halaman tersebut memakai ID untuk mengambil data lama dari database. -->
<a href="update_form_education.php?id_education=<?= $tampil->id_education ?>"
                                            class="btn btn-success">
                                            Update
                                        </a>

                                        <!-- Tombol Delete mengirim ID melalui URL ke `delete_education.php`. ID itu dipakai untuk menentukan data database yang dihapus. -->
<a href="delete_education.php?id_education=<?= $tampil->id_education ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>

                    </table>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "bottom.php" ?>

</body>

</html>
