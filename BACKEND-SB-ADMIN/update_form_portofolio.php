<?php
include "connection.php";

//menyimpan sementara id_portofolio dari awal update hingga akhir update table_portofolio 
//sebelum di eksekusi ke bawh berikut ini

//$_get portofolio menerima update ke table portofolio.php
if (!isset($_GET['id_portofolio']) || empty($_GET['id_portofolio'])) {
    header("Location: tabel_portofolio.php");
    exit();
}


//fungsi untukk menampilkan isi tabel mengunakan  mysqli fetch object
//selanjutnya menuju form bawah untuk menanmpilkan setiap data
$id_portofolio = mysqli_real_escape_string($koneksi, $_GET['id_portofolio']);

//menampilkan data yg dapat di l=kirim dari tompol update portofolio 
$query = mysqli_query($koneksi, "SELECT * FROM portofolio WHERE id_portofolio='$id_portofolio'");
$data  = mysqli_fetch_object($query);


// isi di bawah dari form portofolio
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
                        <h1 class="h3 mb-0 text-gray-800">Update Portofolio</h1>
                    </div>

                    <form action="action_update_portofolio.php" method="POST" enctype="multipart/form-data">

                        <!-- INPUT HIDDEN ID PORTOFOLIO (WAJIB ADA) -->
                        <input type="hidden" name="id_portofolio" value="<?php echo $data->id_portofolio; ?>">

                        <!-- Judul Portofolio -->
                        <div class="mb-3">
                            <label for="judul_portofolio" class="form-label">Judul Portofolio</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="judul_portofolio" 
                                name="judul_portofolio" 
                                value="<?php echo htmlspecialchars($data->judul_portofolio); ?>" 
                                required>
                        </div>

                        <!-- Gambar Portofolio -->
                        <div class="mb-3">
                            <label for="img" class="form-label">Img</label>
                            
                            <!-- Display gambar saat ini -->
                            <div class="mb-2">
                                <?php if (!empty($data->img) && file_exists("foto/" . $data->img)) : ?>
                                    <img src="foto/<?php echo $data->img; ?>" width="150" class="img-thumbnail" alt="Preview Gambar">
                                <?php else : ?>
                                    <small class="text-muted d-block">Belum ada gambar tersimpan</small>
                                <?php endif; ?>
                            </div>

                            <input type="file" class="form-control" id="img" name="img" accept="image/*">
                            <small class="text-muted">*Kosongkan jika tidak ingin mengganti gambar.</small>
                        </div>

                        <!-- Link -->
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input 
                                type="url" 
                                class="form-control" 
                                id="link" 
                                name="link" 
                                value="<?php echo htmlspecialchars($data->link); ?>" 
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea 
                                class="form-control" 
                                id="deskripsi" 
                                name="deskripsi" 
                                rows="4" 
                                required><?php echo htmlspecialchars($data->deskripsi); ?></textarea>
                        </div>

                        <!-- Jenis -->
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="jenis" 
                                name="jenis" 
                                value="<?php echo htmlspecialchars($data->jenis); ?>" 
                                required>
                        </div>

                        <!-- Tombol Submit & Batal -->
                        <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                        <a href="tabel_portofolio.php" class="btn btn-secondary">Batal</a>

                    </form>
                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <?php include "buttom.php"; ?>
</body>
</html>