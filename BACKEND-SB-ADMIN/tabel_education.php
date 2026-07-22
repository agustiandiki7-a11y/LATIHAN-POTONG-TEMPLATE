<?php
include "connection.php";

$select_education = mysqli_query($koneksi, "
    SELECT * FROM education
    ORDER BY 1 DESC
");

if (!$select_education) {
    die("Query gagal: " . mysqli_error($koneksi));
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

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            EDUCATION
                        </h1>
                    </div>

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

                            <?php while ($tampil = mysqli_fetch_object($select_education)): ?>

                                <tr>
                                    <td><?= htmlspecialchars($tampil->nama_jurusan) ?></td>

                                    <td><?= htmlspecialchars($tampil->tahun_belajar) ?></td>

                                    <td><?= htmlspecialchars($tampil->temapat_belajar) ?></td>

                                    <td><?= htmlspecialchars($tampil->deskripsi) ?></td>

                                    <td>
                                        <a href="update_form_education.php?id_education=<?= $tampil->id_education ?>"
                                            class="btn btn-success">
                                            Update
                                        </a>

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