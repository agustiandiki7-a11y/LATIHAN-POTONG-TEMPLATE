<?php
// Menghubungkan file dengan database
include "connection.php";
?>

<?php include "header.php" ?>

<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php" ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php" ?>

                <div class="container-fluid">

                    <!-- Judul halaman -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            FORM MOBILE ICON
                        </h1>
                    </div>

                    <!--
                    Form ini digunakan untuk menambahkan data baru.
                    Data akan dikirim ke action_insert_mobile.php menggunakan method POST.
                    -->
                    <form action="action_insert_mobile.php" method="POST">

                        <div class="form-group">

                            <label>Nama Mobile</label>

                            <!--
                            Input ini akan disimpan ke field "nama"
                            pada tabel mobile.
                            -->
                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan Nama Mobile"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Icon</label>

                            <!--
                            Input ini akan disimpan ke field "icon"
                            pada tabel mobile.

                            Contoh:
                            fab fa-whatsapp
                            fab fa-instagram
                            fab fa-facebook
                            -->
                            <input
                                type="text"
                                name="icon"
                                class="form-control"
                                placeholder="Contoh : fab fa-whatsapp"
                                required>

                        </div>

                        <br>

                        <!-- Tombol Simpan -->
                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-primary">

                            Save

                        </button>

                        <!-- Tombol Kembali -->
                        <a
                            href="tabel_mobile.php"
                            class="btn btn-secondary">

                            Back

                        </a>

                    </form>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "script.php" ?>

</body>

</html>