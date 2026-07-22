<?php
include "connection.php";

$id_familiar = $_POST['id_familiar'];
$vnama       = $_POST['nama'];
$vicon       = $_POST['icon'];

$sql_update = "
    UPDATE familiar SET
        nama = '$vnama',
        icon = '$vicon'
    WHERE id_familiar = '$id_familiar'
";

$update = mysqli_query($koneksi, $sql_update);

if ($update) {
    header("Location: tabel_familiar.php");
    exit;
} else {
    echo "Update gagal: " . mysqli_error($koneksi);
}
?>     