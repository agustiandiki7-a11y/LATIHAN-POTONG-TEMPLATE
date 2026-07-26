<?php
include "connection.php";

$id_mobile = $_GET['id_mobile'];

$select_id = mysqli_query($koneksi, "
    SELECT * FROM mobile
    WHERE id_mobile = '$id_mobile'
");

// Mengubah hasil query menjadi object
$mobile = mysqli_fetch_object($select_id);
?>

<?php include "header.php" ?>

<body id="page-top">

<div id="wrapper">

    <?php include "sidebar.php" ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <?php include "topbar.php" ?>

            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">
                        UPDATE MOBILE ICON
                    </h1>
                </div>

                <form action="action_update_mobile.php" method="POST">

                    <!-- Menyimpan ID -->
                    <input
                        type="hidden"
                        name="id_moble"
                        value="<?= $mobile->id_mobile ?>">

                    <div class="form-group">
                        <label>Nama Mobile</label>
                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            value="<?= $mobile->nama ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input
                            type="text"
                            name="icon"
                            class="form-control"
                            value="<?= $mobile->icon ?>"
                            required>
                    </div>

                    <br>

                    <button
                        type="submit"
                        class="btn btn-success">
                        Update
                    </button>

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