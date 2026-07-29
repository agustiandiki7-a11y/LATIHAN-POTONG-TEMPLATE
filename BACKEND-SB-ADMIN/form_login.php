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
                    <h1 class="h3 mb-4 text-gray-800">Add Login</h1>

                    <!-- Form Tambah -->
                    <form action="action_insert_login.php" method="POST">

                        <div class="form-group mb-4">
                            <label class="text-secondary">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary px-4 mt-2">Submit</button>

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