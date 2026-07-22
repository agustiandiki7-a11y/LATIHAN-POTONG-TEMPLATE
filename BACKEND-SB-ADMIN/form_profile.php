<!--
ini adalah langkah pertama setelah memotong temlate.php
yaitu mebuat form_profile -->
<!-- di tengah tengah halaman ini selanjutnya membuat cation insert_profile
 php dari actio ="action_insert profile php" method post -->
 <!--- lanjutkan membuat file berikutnyaa yaitu from job.php -->

<?php include "header.php"; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>

                    <!--containT star-->
                 <form action="./action_insert.php" method="post">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nama"
                                name="nama"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <textarea
                                name="about"
                                id="about"
                                class="form-control"
                                rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea
                                name="address"
                                id="address"
                                class="form-control"
                                rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input
                                type="text"
                                class="form-control"
                                id="linkedin"
                                name="linkedin">
                        </div>

                        <div class="mb-3">
                            <label for="nationality" class="form-label">Nationalty</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nationality"
                                name="nationality">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">
                            Submit
                        </button>

                    </form>

                    <!--CONTAINT END-->

                    <!-- Content fluid -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include "buttom.php"; ?>

    <!-- Logout Modal-->

</body>

</html>