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
                        <h1 class="h3 mb-0 text-gray-800">Add</h1>
                    </div>

                    <!-- Content Start -->
                    <form action="action_insert_portofolio.php" method="POST" enctype="multipart/form-data">

                        <!-- Judul Portofolio -->
                        <div class="mb-3">
                            <label for="judul_portofolio" class="form-label">Judul Portofolio</label>
                            <input
                                type="text"
                                class="form-control"
                                id="judul_portofolio"
                                name="judul_portofolio"
                                placeholder="Masukkan judul portofolio"
                                required>
                        </div>

                        <!-- Gambar Portofolio -->
                        <div class="mb-3">
                            <label for="img" class="form-label">Img</label>
                            <input
                                type="file"
                                class="form-control"
                                id="img"
                                name="img"
                                accept="image/*"
                                required>
                        </div>

                        <!-- Link Project / Portofolio -->
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input
                                type="url"
                                class="form-control"
                                id="link"
                                name="link"
                                placeholder="https://example.com"
                                required>
                        </div>

                        <!-- Jenis Portofolio -->
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <input
                                type="text"
                                class="form-control"
                                id="jenis"
                                name="jenis"
                                placeholder="Contoh: Web Development / Mobile App"
                                required>
                        </div>

                        <!-- Deskripsi Portofolio -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea
                                class="form-control"
                                id="deskripsi"
                                name="deskripsi"
                                rows="4"
                                placeholder="Masukkan deskripsi portofolio"
                                required></textarea>
                        </div>

                        <!-- Tombol Submit & Kembali -->
                        <button type="submit" name="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <a href="tabel_portofolio.php" class="btn btn-secondary">
                            Batal
                        </a>

                    </form>
                    <!-- Content End -->

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

</body>

</html>