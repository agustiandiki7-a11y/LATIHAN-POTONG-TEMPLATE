<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul portofolio dan terhubung dengan tabel `portofolio` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

// Mengambil data submit dari input form yang memiliki name="submit".
if (isset($_POST['submit'])) {

    // 1. Ambil input data dari form
    // Mengambil data judul_portofolio dari input form yang memiliki name="judul_portofolio".
    $vjudul     = mysqli_real_escape_string($koneksi, $_POST['judul_portofolio']);
    // Mengambil data link dari input form yang memiliki name="link".
    $vlink      = mysqli_real_escape_string($koneksi, $_POST['link']);
    // Mengambil data jenis dari input form yang memiliki name="jenis".
    $vjenis     = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    // Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
    $vdeskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    // 2. Cek apakah ada file gambar yang diunggah
    if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {

        // Folder penyimpanan gambar
        $target_dir = __DIR__ . "/foto/";

        // Buat folder 'foto/' otomatis jika belum ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Buat nama file unik dengan time()
        $ext         = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $vimgname    = time() . "." . $ext;
        $target_file = $target_dir . $vimgname;

        // 3. Pindahkan gambar ke folder foto/
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {

            // 4. Query insert ke tabel portofolio
            // Query INSERT menyimpan data yang berasal dari form ke tabel `portofolio` di database.
            $query = "INSERT INTO portofolio (judul_portofolio, img, link, jenis, deskripsi) 
                      VALUES ('$vjudul', '$vimgname', '$vlink', '$vjenis', '$vdeskripsi')";

            $sql_insert = mysqli_query($koneksi, $query);

            if ($sql_insert) {
                // Berhasil -> Kembali ke tabel_portofolio.php
                // Setelah proses selesai, pengguna diarahkan ke ` tabel_portofolio.php` agar hasil terbaru dapat dilihat.
                header("Location: tabel_portofolio.php");
                exit();
            } else {
                die("Gagal simpan ke database: " . mysqli_error($koneksi));
            }

        } else {
            die("Gagal mengunggah gambar ke folder foto/!");
        }

    } else {
        die("Harap pilih gambar terlebih dahulu!");
    }

} else {
    // Setelah proses selesai, pengguna diarahkan ke ` form_portofolio.php` agar hasil terbaru dapat dilihat.
    header("Location: form_portofolio.php");
    exit();
}
?>
