<?php
include "connection.php";

if (!isset($_GET['id_familiar'])) {
    header("Location: tabel_familiar.php");
    exit;
}

$id_familiar = $_GET['id_familiar'];

$select_id = mysqli_query($koneksi, "
    SELECT * FROM familiar
    WHERE id_familiar = '$id_familiar'
");

$familiar = mysqli_fetch_object($select_id);

if (!$familiar) {
    die("Data familiar tidak ditemukan.");
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
                            Update Familiar
                        </h1>
                    </div>

                    <form action="action_update_familiar.php" method="post">

                        <input type="hidden"
                            name="id_familiar"
                            value="<?= $familiar->id_familiar ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Name
                            </label>

                            <input type="text"
                                class="form-control"
                                id="nama"
 name="nama"value="<?= htmlspecialchars($familiar->nama) ?>"required>
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">
                                Icon
                            </label>

                            <input type="text"
                                class="form-control"id="icon"name="icon"value="<?= htmlspecialchars($familiar->icon) ?>" required>
                        </div>

                        <button type="submit"
                            class="btn btn-primary"
                            name="update">
                            Update
                        </button>

                        <a href="tabel_familiar.php"
                            class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "bottom.php" ?>