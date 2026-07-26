<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul familiar dan terhubung dengan tabel `familiar` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Menerima ID unik familiar yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
if (!isset($_GET['id_familiar'])) {
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_familiar.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_familiar.php");
    exit;
}

// Menerima ID unik familiar yang dikirim melalui URL, biasanya dari tombol Update atau Delete pada halaman tabel.
$id_familiar = $_GET['id_familiar'];

$select_id = mysqli_query($koneksi, "
    // Query SELECT mengambil data dari tabel `familiar`. Hasilnya dipakai untuk mengisi tabel HTML atau form update.
    SELECT * FROM familiar
    WHERE id_familiar = '$id_familiar'
");

// Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
$familiar = mysqli_fetch_object($select_id);

if (!$familiar) {
    die("Data familiar tidak ditemukan.");
}
?>

<?php include "header.php" ?>

<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `familiar` pada database. -->
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

                    <!-- Form ini mengirim semua input ke `action_update_familiar.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_update_familiar.php" method="post">

                        <!-- Input name="id_familiar" menerima ID unik familiar. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="hidden"
                            name="id_familiar"
                            value="<?= $familiar->id_familiar ?>">

                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Name
                            </label>

                            <!-- Input name="nama" menerima nama. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
<input type="text"
                                class="form-control"
                                id="nama"
 name="nama"value="<?= htmlspecialchars($familiar->nama) ?>"required>
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">
                                Icon
                            </label>

                            <!-- Input name="icon" menerima icon. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. Nilai awal pada form update berasal dari data yang sebelumnya diambil dengan query SELECT. -->
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
