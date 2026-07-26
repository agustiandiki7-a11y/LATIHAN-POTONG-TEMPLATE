<?php include "header.php"; ?>
<!-- KETERANGAN ALUR DATA: File ini merupakan bagian modul sidebar_foto dan terhubung dengan tabel `sidebar_foto` di database. -->


<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `sidebar_foto` pada database. -->
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
                        <h1 class="h3 mb-0 text-gray-800">Upload Sidebar Foto</h1>
                    </div>

                    <!-- CONTAIN START -->
                    <!-- WAJIB menambahkan enctype="multipart/form-data" untuk upload foto -->
                    <!-- Form ini mengirim semua input ke `action_insert_sidebar_foto.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_insert_sidebar_foto.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="sidebar_foto" class="form-label">Sidebar</label>
                            <!-- Input name="sidebar_foto" menerima sidebar_foto. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input 
                                type="file" 
                                class="form-control" 
                                id="img" 
                                name="sidebar_foto">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">
                            Submit
                        </button>
                        <a href="tabel_sidebar_foto.php" class="btn btn-secondary">Kembali</a>

                    </form>
                    <!-- CONTAIN END -->

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
