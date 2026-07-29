<?php
include "connection.php";

$id_skill = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM sekill WHERE id_skill = '$id_skill'");
$data = mysqli_fetch_object($query);
?>

<?php include "header.php"; ?>

<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php"; ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Update Skill</h1>

                    <!-- Pastikan action ini sesuai dengan nama file di Langkah 2 -->
                    <form action="action_update_sekill.php" method="POST">

                        <input type="hidden" name="id_skill" value="<?php echo $data->id_skill; ?>">

                        <div class="form-group mb-4">
                            <label class="text-secondary">Nama Skill</label>
                            <input type="text" name="nama_skill" class="form-control" value="<?php echo htmlspecialchars($data->nama_skill); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success px-4 mt-2">Update</button>

                    </form>

                </div>

            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>

</html>