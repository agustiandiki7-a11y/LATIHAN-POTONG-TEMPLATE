<?php include "header.php" ?>
<!-- KETERANGAN ALUR DATA: File ini merupakan bagian modul job dan terhubung dengan tabel `job` di database. -->


<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `job` pada database. -->
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
                        <h1 class="h3 mb-0 text-gray-800">Job</h1>

                    </div>
                    <!--containT star-->
                    <!-- Form ini mengirim semua input ke `action_insert_job.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_insert_job.php" method="POST">

                        <div class="mb-3">
                            <label for="job" class="form-label">Profession</label>
                            <!-- Input name="nama_pekerjaan" menerima nama pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input
                                type="text"
                                class="form-control"
                                id="job"
                                name="nama_pekerjaan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <!-- Input name="tahun_pekerjaan" menerima tahun pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input
                                type="text"
                                class="form-control"
                                id="year"
                                name="tahun_pekerjaan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="place" class="form-label">Place</label>
                            <!-- Input name="tempat_pekerjaan" menerima tempat pekerjaan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input
                                type="text"
                                class="form-control"
                                id="place"
                                name="tempat_pekerjaan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">
                                Responsibilities
                            </label>

                            <!-- Input name="deskripsi" menerima deskripsi. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<textarea
                                name="deskripsi"
                                id="deskripsi"
                                class="form-control"
                                rows="10"
                                required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>

                    </form>

                    <!--CONTAINT END-->

                    <!-- Content fluid -->

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
        <?php include "buttom.php" ?>

        <!-- Logout Modal-->


</body>
