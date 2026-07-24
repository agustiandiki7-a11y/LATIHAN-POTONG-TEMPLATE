<?php
include "connection.php";

$id_training = $_GET['id_training'] ?? null;

// Pastikan di sini: FROM training (BUKAN FROM job)
$select_training = mysqli_query($koneksi, "
    SELECT * FROM training WHERE id_training = '$id_training'
");

// Pastikan variabelnya disimpen ke $training
$training = mysqli_fetch_object($select_training);
?>
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
                        <h1 class="h3 mb-0 text-gray-800">training</h1>
                    </div>

                    <form action="action_update_training.php" method="post">

                        <input type="hidden"
                            name="id_training"
                            value="<?php echo $training->id_training; ?>">

                        <div class="mb-3">
                            <label class="form-label">Training</label>

                            <input type="text"
                                class="form-control"
                                name="nama_training"
                                value="<?php echo $training->nama_training; ?>">
                        </div>

                        <!-- Input Year -->
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="text" class="form-control" name="tahun_training" required>
                        </div>

                        <!-- Input Place -->
                        <div class="mb-3">
                            <label class="form-label">Place</label>
                            <input type="text" class="form-control" name="tempat_training" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>

                            <textarea name="deskripsi"
                                class="form-control"
                                rows="10"><?php echo $training->deskripsi; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                    </form>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "buttom.php" ?>

</body>