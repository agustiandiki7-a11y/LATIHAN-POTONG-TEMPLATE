<?php
include "connection.php";

if (!isset($_GET['id_training']) || empty($_GET['id_training'])) {
    header("Location: tabel_training.php");
    exit();
}

$id_training = mysqli_real_escape_string($koneksi, $_GET['id_training']);

// Ambil data dari tabel training
$select_id = mysqli_query($koneksi, "
    SELECT * FROM training
    WHERE id_training = '$id_training'
");

$training = mysqli_fetch_object($select_id);

if (!$training) {
    echo "Data tidak ditemukan!";
    exit();
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
                        <h1 class="h3 mb-0 text-gray-800">training</h1>
                    </div>

                    <form action="action_update_training.php" method="POST">

                        <!-- Hidden ID -->
                        <input type="hidden" name="id_training" value="<?= $training->id_training ?>">

                        <!-- Field Training (nama_training) -->
                        <div class="form-group mb-3">
                            <label>Training</label>
                            <input type="text" name="nama_training" class="form-control" value="<?= htmlspecialchars($training->nama_training) ?>" required>
                        </div>

                        <!-- Field Year (tahun_training) -->
                        <div class="form-group mb-3">
                            <label>Year</label>
                            <input type="text" name="tahun_training" class="form-control" value="<?= htmlspecialchars($training->tahun_training) ?>" required>
                        </div>

                        <!-- Field Place (tempat_training) -->
                        <div class="form-group mb-3">
                            <label>Place</label>
                            <input type="text" name="tempat_training" class="form-control" value="<?= htmlspecialchars($training->tempat_training) ?>" required>
                        </div>

                        <!-- Field Description (deskripsi) -->
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($training->deskripsi) ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="tabel_training.php" class="btn btn-secondary">Batal</a>

                    </form>

                </div>

            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>
</html>