<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Portofolio Baru</h4>
                </div>
                <div class="card-body">
                    <form action="action_insert_portofolio.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_portfolio" class="form-label">Judul Portofolio</label>
                            <input type="text" class="form-control" id="judul_portfolio" name="judul_portfolio" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis / Kategori</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="url" class="form-control" id="link" name="link" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Upload Gambar (img)</label>
                            <input type="file" class="form-control" id="img" name="img" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="tabel_portofolio.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>