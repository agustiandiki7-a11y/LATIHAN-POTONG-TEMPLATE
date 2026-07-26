<?php include "header.php" ?>
<!-- KETERANGAN ALUR DATA: File ini merupakan bagian modul education dan terhubung dengan tabel `education` di database. -->


<!-- KETERANGAN TAMPILAN DAN SUMBER DATA: Halaman ini menampilkan/mengolah data dari tabel `education` pada database. -->
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
                        <h1 class="h3 mb-0 text-gray-800">Education</h1>

                    </div>
                    <!--containT star-->
                    <!-- Form ini mengirim semua input ke `action_insert_education.php` menggunakan method POST untuk diproses ke database. -->
<form action="action_insert_education.php" method="post">

                        <div class="mb-3">
                            <label for="nama_jurusan" class="form-label">Major</label>
                            <!-- Input name="nama_jurusan" menerima nama_jurusan. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input type="text"
                                class="form-control"
                                id="nama_jurusan"
                                name="nama_jurusan">
                        </div>

                        <div class="mb-3">
                            <label for="tahun_belajar" class="form-label">Year</label>
                            <!-- Input name="tahun_belajar" menerima tahun_belajar. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input type="text"
                                class="form-control"
                                id="tahun_belajar"
                                name="tahun_belajar">
                        </div>

                        <div class="mb-3">
                            <label for="temapat_belajar" class="form-label">Place</label>
                            <!-- Input name="temapat_belajar" menerima temapat_belajar. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<input type="text"
                                class="form-control"
                                id="temapat_belajar"
                                name="temapat_belajar">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Description </label>
                            <!-- Input name="deskripsi" menerima deskripsi. Saat Submit ditekan, nilainya dikirim ke file action melalui POST. -->
<textarea name="deskripsi"
                                id="deskripsi"
                                cols="30"
                                class="form-control"
                                rows="10"></textarea>
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

</html>
