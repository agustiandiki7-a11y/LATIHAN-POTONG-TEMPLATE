<?php include "header.php" ?>
<!-- KETERANGAN ALUR DATA: File ini merupakan bagian modul familiar dan terhubung dengan tabel `familiar` di database. -->


<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `familiar` pada database. -->
<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php" ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- content start -->

                <!-- Form ini mengirim semua input ke `action_insert_familiar.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_insert_familiar.php" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            nama
                        </label>
                        <!-- Input name="nama" menerima nama. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input type="text" class="form-control"
                        id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">
                            icon</label>
                        <!-- Input name="icon" menerima icon. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input type="text" class="form-control"
                        id="nama" name="icon">
                    </div>

                    <button type="submit" class="btn btn-primary">submit</button>
                </form>

                       

                    <!-- content end -->

                    </div>
                    <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php" ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include "bottom.php" ?>
