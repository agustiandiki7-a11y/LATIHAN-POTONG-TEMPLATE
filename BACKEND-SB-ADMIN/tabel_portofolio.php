<?php
include "connection.php";
session_start();
if ($_SESSION['status'] !="login"){
    header("location:login.php?pesan=belum_login");
}

// Ambil data portfolio
$select_portfolio = mysqli_query($koneksi, "SELECT * FROM portfolio ORDER BY id_portfolio DESC");

if (!$select_portfolio) {
    die("Query gagal : " . mysqli_error($koneksi));
}

include "header.php";
?>

<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php"; ?>

                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Portfolio</h1>
                    </div>

                    <a href="form_portofolio.php" class="btn btn-info mb-3">
                        Add
                    </a>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Portfolio</th>
                                    <th>Image</th>
                                    <th>URL</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php while ($tampil = mysqli_fetch_object($select_portfolio)) : ?>

                                    <tr>

                                        <td><?= $tampil->judul_portfolio; ?></td>

                                        <td>
                                            <?php if (!empty($tampil->img)) { ?>
                                                <img src="foto/<?= $tampil->img; ?>" width="100">
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <a href="<?= $tampil->link; ?>" target="_blank">
                                                <?= $tampil->link; ?>
                                            </a>
                                        </td>

                                        <td><?= $tampil->deskripsi; ?></td>

                                        <td><?= $tampil->jenis; ?></td>

                                        <td>

                                            <a href="update_form_portofolio.php?id_portofolio=<?= $tampil->id_portofolio; ?>"
                                                class="btn btn-success btn-sm">
                                                Update
                                            </a>

                                            <a href="delete_portofolio.php?id_portofolio=<?= $tampil->id_portofolio; ?>"
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

            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>

</html>