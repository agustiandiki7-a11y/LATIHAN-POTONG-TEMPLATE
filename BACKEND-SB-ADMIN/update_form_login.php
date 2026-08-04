<?php
include "connection.php";

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM login WHERE id_login = '$id'");
$data = mysqli_fetch_object($query);
?>

<?php include "header.php"; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Login</h1>

                    <!-- Form Update -->
                    <form action="action_update_login.php" method="POST">

                        <input type="hidden" name="id_login" value="<?php echo $data->id_login; ?>">

                        <div class="form-group mb-4">
                            <label class="text-secondary">email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($data->email); ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo htmlspecialchars($data->password); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success px-4 mt-2">Update</button>

                    </form>

                </div>
                <!-- End Container Fluid -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>

</html>