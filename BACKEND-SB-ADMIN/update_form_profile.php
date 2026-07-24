<?php
include "connection.php";

// Mengecek apakah id_training ada di URL
if (!isset($_GET['id_training']) || empty($_GET['id_training'])) {
    header("Location: tabel_training.php"); // Sesuaikan nama file tabel training Anda
    exit;
}

// Mengambil id_training dan me-escape dari SQL Injection
$id_training = mysqli_real_escape_string($koneksi, $_GET['id_training']);

// Mengambil data training berdasarkan id_training
$select_id = mysqli_query(
    $koneksi,
    "SELECT * FROM training WHERE id_training='$id_training'"
);

// Mengubah hasil query menjadi object
$training = mysqli_fetch_object($select_id);

// Jika data tidak ditemukan
if (!$training) {
    die("Data training tidak ditemukan");
}
?>

<?php include "header.php"; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">
                        Update Training
                    </h1>

                    <form action="action_update_training.php" method="POST">

                        <!-- Hidden ID -->
                        <input
                            type="hidden"
                            name="id_training"
                            value="<?php echo $training->id_training; ?>">

                        <!-- Nama Training -->
                        <div class="form-group">
                            <label>Nama Training</label>

                            <input
                                type="text"
                                name="nama_training"
                                class="form-control"
                                value="<?php echo htmlspecialchars($training->nama_training); ?>"
                                required>
                        </div>

                        <!-- Tahun Training -->
                        <div class="form-group">
                            <label>Tahun</label>

                            <input
                                type="text"
                                name="tahun_training"
                                class="form-control"
                                value="<?php echo htmlspecialchars($training->tahun_training); ?>"
                                required>
                        </div>

                        <!-- Tempat Training -->
                        <div class="form-group">
                            <label>Tempat</label>

                            <input
                                type="text"
                                name="tempat_training"
                                class="form-control"
                                value="<?php echo htmlspecialchars($training->tempat_training); ?>"
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label>Deskripsi</label>

                            <textarea
                                name="deskripsi"
                                class="form-control"
                                rows="5"
                                required><?php echo htmlspecialchars($training->deskripsi); ?></textarea>
                        </div>

                        <!-- Tombol Update -->
                        <button
                            type="submit"
                            name="update"
                            class="btn btn-primary">

                            Update Data
                        </button>

                        <!-- Tombol Kembali -->
                        <a
                            href="tabel_training.php"
                            class="btn btn-secondary">

                            Kembali
                        </a>

                    </form>

                </div>
                <!-- End Container Fluid -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <?php include "buttom.php"; ?>