<?php
include "connection.php";

// Query disesuaikan dengan nama tabel di phpMyAdmin (`laguage`)
$select_id_language = mysqli_query($koneksi, "
    SELECT * FROM language
    ORDER BY id_language DESC
");

if (!$select_id_language) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>
<?php include "header.php"; ?>

<body id="page-top">

    <div id="wrapper">
        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "topbar.php"; ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Language</h1>
                    </div>

                    <div class="mb-3">
                        <a href="form_language.php" class="btn btn-info">Add Language</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Bahasa</th>
                                    <th scope="col">Flag</th>
                                    <th scope="col" style="width: 180px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($tampil = mysqli_fetch_object($select_id_language)) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($tampil->bahasa) ?></td>
                                        <td>
                                            <?php if (!empty($tampil->flag) && file_exists(__DIR__ . "/flag/" . $tampil->flag)) : ?>
                                                <img src="flag/<?= $tampil->flag ?>" width="60" class="img-thumbnail" alt="Bendera">
                                            <?php else : ?>
                                                <span class="text-muted"><small>No Flag</small></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <!-- Tombol Delete -->
                                            <a href="delete_language.php?id_language=<?= $tampil->id_language ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Delete
                                            </a>

                                            <!-- Tombol Update -->
                                            <a href="update_form_language.php?id_language=<?= $tampil->id_language ?>"
                                               class="btn btn-success btn-sm">
                                                Update
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