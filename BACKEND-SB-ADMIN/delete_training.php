<?php

include "connection.php";

// untuk menerima id_training yang dibawa dari tombol DELETE dari TABEL TRAINING
$id_training = $_GET['id_training'];

// ini perintah sql untuk mendelete data berdasarkan id_training yang dibawa 
$delete = mysqli_query($koneksi, "DELETE FROM training WHERE id_training='$id_training'");

// setelah proses delete dijalankan, maka akan kembali ke file tabel_training.php 
header("Location: tabel_training.php");

?>