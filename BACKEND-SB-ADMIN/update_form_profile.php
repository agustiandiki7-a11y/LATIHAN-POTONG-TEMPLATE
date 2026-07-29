<?php
// ======================================================
// FILE : update_profile.php
// MODUL : Profile
// Tabel Database : profile
// Fungsi : Menampilkan data profile berdasarkan ID,
//          lalu mengirim perubahan ke action_update_profile.php
// ======================================================

// Menghubungkan file dengan database agar variabel $koneksi dapat digunakan.
include "connection.php";

// Mengecek apakah parameter id_profile dikirim melalui URL.
if (empty($_GET['id_profile'])) {
    header("Location: tabel_profile.php");
    exit;
}

// Mengambil ID profile dari URL dan mengamankannya dari SQL Injection.
$id_profile = mysqli_real_escape_string($koneksi, $_GET['id_profile']);

// Mengambil data profile berdasarkan ID dari tabel profile.
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM profile WHERE id_profile='$id_profile'"
);

// Mengubah hasil query menjadi object agar mudah dipanggil.
$profile = mysqli_fetch_object($query);

// Jika data tidak ditemukan, tampilkan pesan.
if (!$profile) {
    die("Data profile tidak ditemukan.");
}
?>

<?php include "header.php"; ?>

<!-- ======================================================
     HALAMAN UPDATE PROFILE
     Menampilkan data dari tabel profile untuk diedit.
====================================================== -->

<body id="page-top">

<div id="wrapper">

    <?php include "sidebar.php"; ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <?php include "topbar.php"; ?>

            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">
                    Update Profile
                </h1>

                <!--
                    Form mengirim data ke action_update_profile.php
                    menggunakan method POST.
                -->
                <form action="action_update_profile.php" method="POST">

                    <!-- Mengirim ID profile sebagai hidden input -->
                    <input
                        type="hidden"
                        name="id_profile"
                        value="<?= htmlspecialchars($profile->id_profile) ?>"
                    >

                    <?php

                    // Daftar field yang akan ditampilkan.
                    $fields = [
                        ['nama', 'Nama', 'text'],
                        ['website', 'Website', 'text'],
                        ['phone', 'Phone', 'text'],
                        ['email', 'Email', 'email'],
                        ['linkedin', 'LinkedIn', 'text'],
                        ['nationality', 'Nationality', 'text']
                    ];

                    foreach ($fields as $field) {

                        $property = ($field[0] == 'nationality')
                            ? 'nationalty'
                            : $field[0];
                    ?>

                        <div class="mb-3">

                            <label class="form-label">
                                <?= $field[1] ?>
                            </label>

                            <input
                                type="<?= $field[2] ?>"
                                name="<?= $field[0] ?>"
                                class="form-control"
                                value="<?= htmlspecialchars($profile->$property ?? '') ?>"
                            >

                        </div>

                    <?php } ?>

                    <!-- ABOUT -->
                    <div class="mb-3">

                        <label class="form-label">
                            About
                        </label>

                        <!--
                            Input about berisi deskripsi profile.
                            Nilai awal berasal dari database.
                        -->
                        <textarea
                            name="about"
                            class="form-control"
                            rows="4"
                        ><?= htmlspecialchars($profile->about ?? '') ?></textarea>

                    </div>

                    <!-- ADDRESS -->
                    <div class="mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <!--
                            Input address berisi alamat profile.
                            Nilai awal berasal dari database.
                        -->
                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                        ><?= htmlspecialchars($profile->address ?? '') ?></textarea>

                    </div>

                    <!-- Tombol -->
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update
                    </button>

                    <a
                        href="tabel_profile.php"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                </form>

            </div>

        </div>

        <?php include "footer.php"; ?>

    </div>

</div>

<?php include "buttom.php"; ?>

</body>
</html>