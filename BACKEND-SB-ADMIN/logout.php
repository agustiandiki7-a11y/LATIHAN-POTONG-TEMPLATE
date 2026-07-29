<?php
// 1. Memulai session
session_start();

// 2. Menghapus semua variabel session
session_unset();

// 3. Menghancurkan session
session_destroy();

// 4. Mengalihkan (redirect) langsung ke login.php dengan notifikasi logout
header("Location: login.php?pesan=logout");
exit();
?>