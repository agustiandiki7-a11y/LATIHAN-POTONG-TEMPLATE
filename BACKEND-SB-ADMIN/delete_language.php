<?php
include "connection.php";

// 1. Cek apakah parameter id_language ada di URL
if (isset($_GET['id_language'])) {
    $id_language = intval($_GET['id_language']);

    // 2. Ambil data nama file flag terlebih dahulu untuk dihapus dari folder (opsional)
    $query_select = mysqli_query($koneksi, "SELECT flag FROM language WHERE id_language = $id_language");
    $data = mysqli_fetch_object($query_select);

    if ($data) {
        $file_flag = $data->flag;

        // 3. Eksekusi query DELETE dengan penanganan error MySQLi
        $query_delete = mysqli_query($koneksi, "DELETE FROM language WHERE id_language = $id_language");

        if ($query_delete) {
            // Jika sukses dan file flag ada, hapus file gambarnya dari folder
            if (!empty($file_flag) && file_exists(__DIR__ . "/flag/" . $file_flag)) {
                unlink(__DIR__ . "/flag/" . $file_flag);
            }

            // Redirect kembali ke halaman utama bahasa dengan pesan sukses
            echo "<script>
                    alert('Data bahasa berhasil dihapus!');
                    document.location.href = 'language.php'; // Sesuaikan nama file halaman utama kamu
                  </script>";
        } else {
            // Jika gagal (Biasanya karena error Foreign Key Constraint / relasi tabel)
            $error_msg = mysqli_error($koneksi);
            
    
    }

    header("Location:tabel_language.php");

}
?>