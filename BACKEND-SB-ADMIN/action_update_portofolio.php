<?php
// KETERANGAN ALUR DATA:
// File ini merupakan bagian modul portofolio dan terhubung dengan tabel `portofolio` di database.

// Menghubungkan halaman dengan connection.php agar variabel $koneksi dapat digunakan untuk mengakses database.
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Tangkap data dari form
    // Mengambil data ID unik portofolio dari input form yang memiliki name="id_portofolio".
    $id_portofolio   = mysqli_real_escape_string($koneksi, $_POST['id_portofolio']);
    // Mengambil data judul_portofolio dari input form yang memiliki name="judul_portofolio".
    $vjudul          = mysqli_real_escape_string($koneksi, $_POST['judul_portofolio']);
    // Mengambil data link dari input form yang memiliki name="link".
    $vlink           = mysqli_real_escape_string($koneksi, $_POST['link']);
    // Mengambil data jenis dari input form yang memiliki name="jenis".
    $vjenis          = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    // Mengambil data deskripsi dari input form yang memiliki name="deskripsi".
    $vdeskripsi      = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $target_dir = __DIR__ . "/foto/";

    // Otomatis buat folder 'foto/' jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Jika user memilih file gambar baru
    if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {

        $ext         = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $vimgname    = time() . "." . $ext;
        $target_file = $target_dir . $vimgname;

        // Ambil gambar lama dari database untuk dihapus
        $query_lama = mysqli_query($koneksi, "SELECT img FROM portofolio WHERE id_portofolio='$id_portofolio'");
        if ($query_lama && mysqli_num_rows($query_lama) > 0) {
            // Mengambil satu baris hasil query agar setiap field database dapat dipanggil dan ditampilkan pada halaman.
            $data_lama = mysqli_fetch_object($query_lama);
            if (!empty($data_lama->img) && file_exists($target_dir . $data_lama->img)) {
                unlink($target_dir . $data_lama->img);
            }
        }

        // Upload gambar baru
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            $sql_update = mysqli_query($koneksi, "
                UPDATE portofolio SET 
                    judul_portofolio = '$vjudul',
                    img              = '$vimgname',
                    link             = '$vlink',
                    deskripsi        = '$vdeskripsi',
                    jenis            = '$vjenis'
                WHERE id_portofolio  = '$id_portofolio'
            ");
        } else {
            die("Gagal mengunggah gambar baru!");
        }

    } else {
        // Jika tidak upload gambar baru, update teksnya saja
        $sql_update = mysqli_query($koneksi, "
            UPDATE portofolio SET 
                judul_portofolio = '$vjudul',
                link             = '$vlink',
                deskripsi        = '$vdeskripsi',
                jenis            = '$vjenis'
            WHERE id_portofolio  = '$id_portofolio'
        ");
    }

    if ($sql_update) {
        // Setelah proses selesai, pengguna diarahkan ke ` tabel_portofolio.php` agar hasil terbaru dapat dilihat.
        header("Location: tabel_portofolio.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($koneksi));
    }

} else {
    // Setelah proses selesai, pengguna diarahkan ke ` tabel_portofolio.php` agar hasil terbaru dapat dilihat.
    header("Location: tabel_portofolio.php");
    exit();
}
?>
