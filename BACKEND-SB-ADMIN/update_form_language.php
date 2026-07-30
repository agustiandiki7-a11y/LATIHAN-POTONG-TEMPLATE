<?php
include "connection.php";

// Memeriksa parameter id_language dari URL
if (!isset($_GET['id_language']) || empty($_GET['id_language'])) {
    header("Location: tabel_language.php");
    exit();
}

$id_language = mysqli_real_escape_string($koneksi, $_GET['id_language']);

// Mengambil data dari tabel `laguage` berdasarkan `id_language`
$query = mysqli_query($koneksi, "SELECT * FROM language WHERE id_language='$id_language'");
$data  = mysqli_fetch_object($query);

if (!$data) {
    echo "<script>
            alert('Data tidak ditemukan di database!');
            window.location.href='tabel_language.php';
          </script>";
    exit();
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Language</h1>
                    </div>

                    <!-- Form Edit Data -->
                    <form action="action_update_language.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Kirim id_language sebagai input hidden -->
                        <input type="hidden" name="id_language" value="<?= $data->id_language ?>">

                        <div class="form-group mb-3">
                            <label>Bahasa</label>
                            <input type="text" name="bahasa" class="form-control" value="<?= htmlspecialchars($data->bahasa) ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Flag Saat Ini</label><br>
                            <?php if (!empty($data->flag) && file_exists(__DIR__ . "/flag/" . $data->flag)) : ?>
                                <img src="flag/<?= $data->flag ?>" width="80" class="img-thumbnail mb-2"><br>
                            <?php else : ?>
                                <span class="text-muted"><small>Tidak ada gambar bendera saat ini</small></span><br>
                            <?php endif; ?>
                            
                            <small class="text-muted">*Pilih gambar baru jika ingin mengganti flag</small>
                            <input type="file" name="flag" class="form-control mt-1" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-success">Update Data</button>
                        <a href="tabel_language.php" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include "buttom.php"; ?>

</body>
</html>