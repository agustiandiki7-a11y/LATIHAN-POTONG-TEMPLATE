<?php
include "connection.php";

// Menangkap ID dari URL
$id_reperence = $_GET['id'];

// Mengambil data spesifik berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM reference WHERE id_reperence = '$id_reperence'");
$data = mysqli_fetch_object($query);

if (!$data) {
    die("Data tidak ditemukan!");
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

                    <h1 class="h3 mb-4 text-gray-800">Update Reference</h1>

                    <form action="action_update_reference.php" method="POST">

                        <!-- Input Hidden ID untuk dikirim ke action_update_reference.php -->
                        <input type="hidden" name="id_reperence" value="<?php echo $data->id_reperence; ?>">

                        <div class="form-group mb-4">
                            <label class="text-secondary">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($data->nama); ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo htmlspecialchars($data->jabatan); ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" value="<?php echo htmlspecialchars($data->perusahaan); ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($data->phone); ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($data->email); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success px-4 mt-2">Update</button>

                    </form>

                </div>

            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>

</html>