<?php
include "connection.php";

// 1. Tangkap parameter ID dari URL tombol update di tabel
if (!isset($_GET['id_sedebar_foto']) || empty($_GET['id_sedebar_foto'])) {
    header("Location: tabel_sidebar_foto.php");
    exit();
}

$id_sedebar_foto = mysqli_real_escape_string($koneksi, $_GET['id_sedebar_foto']);

// 2. Ambil data dari database
$select_id = mysqli_query($koneksi, "SELECT * FROM sidebar_foto WHERE id_sedebar_foto='$id_sedebar_foto'");

// 3. Mengubah hasil query menjadi objek $data
$data = mysqli_fetch_object($select_id);

if (!$data) {
    die("Data foto tidak ditemukan di database!");
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
                    <h1 class="h3 mb-4 text-gray-800">Update Sidebar Foto</h1>

                    <!-- FORM UTAMA -->
                    <form action="action_update_sidebar_foto.php" method="POST" enctype="multipart/form-data">

                        <!-- Input hidden mengirimkan value ID secara rahasia -->
                        <input type="hidden" name="id_sedebar_foto" value="<?php echo $data->id_sedebar_foto; ?>">

                        <div class="form-group mb-3">
                            <label>Sidebar Foto</label>

                            <!-- Pratinjau Foto Lama jika ada -->
                            <div class="mb-2">
                                <?php if (!empty($data->sidebar_foto) && file_exists("sidebar_foto/" . $data->sidebar_foto)) : ?>
                                    <img src="sidebar_foto/<?php echo $data->sidebar_foto; ?>" width="120" class="img-thumbnail" alt="Foto Lama">
                                <?php endif; ?>
                            </div>

                            <input type="file" name="sidebar_foto" class="form-control" accept="image/*" required>
                            <small class="text-muted">*Pilih file foto baru dari laptop kamu.</small>
                        </div>

                        <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                        <a href="tabel_sidebar_foto.php" class="btn btn-secondary">Batal</a>

                    </form>

                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <?php include "buttom.php"; ?>
</body>