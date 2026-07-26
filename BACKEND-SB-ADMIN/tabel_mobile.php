<?php
include "connection.php";

// Menghubungkan file dengan database profile-cv.

// Mengambil seluruh data dari tabel mobile.
$select_mobile = mysqli_query($koneksi, "
    SELECT * FROM mobile
    ORDER BY id_mobile DESC
");

// Mengecek apakah query berhasil dijalankan.
if (!$select_mobile) {
    die("Query gagal : " . mysqli_error($koneksi));
}
?>

<?php include "header.php" ?>

<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php" ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php" ?>

                <div class="container-fluid">

                    <!-- Judul Halaman -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            MOBILE ICON
                        </h1>
                    </div>

                    <!-- Tombol Add -->
                    <a href="form_mobile.php" class="btn btn-info mb-3">
                        Add
                    </a>

                    <table class="table table-striped">

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>Nama</th>
                                <th>Icon</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            while ($mobile = mysqli_fetch_object($select_mobile)) {
                            ?>

                                <tr>

                                    <td><?= $no++ ?></td>

                                    <td><?= $mobile->nama ?></td>

                                    <td class="align center">
                                        <?php
                                        if (
                                            strpos($mobile->icon, 'fab') !== false ||
                                            strpos($mobile->icon, 'fas') !== false ||
                                            strpos($mobile->icon, 'far') !== false
                                        ) {
                                        ?>
                                            <i class="<?= $mobile->icon ?>" style="font-size:28px;"></i>
                                        <?php
                                        } else {
                                        ?>
                                            <i class="<?= $mobile->icon ?> colored" style="font-size:28px;"></i>
                                        <?php
                                        }
                                        ?>
                                    </td>

                                    
                                    <td style="position: relative; z-index: 10;">

                                        <a href="update_form_mobile.php?id_mobile=<?= $mobile->id_mobile ?>"
                                            class="btn btn-success btn-sm"
                                            style="position: relative; z-index: 11; pointer-events: auto;">
                                            Update
                                        </a>

                                        <a href="delete_mobile.php?id_mobile=<?= $mobile->id_mobile ?>"
                                            class="btn btn-danger btn-sm"
                                            style="position: relative; z-index: 11; pointer-events: auto;"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Delete
                                        </a>

                                    

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "script.php" ?>

</body>

</html>