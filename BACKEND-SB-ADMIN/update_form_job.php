<?php
include "connection.php";

$id_job = $_GET['id_job'];

$select_id = mysqli_query($koneksi, "
    SELECT * FROM job 
    WHERE id_job = '$id_job'
");

$job = mysqli_fetch_object($select_id);
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
                        <h1 class="h3 mb-0 text-gray-800">Job</h1>
                    </div>

                    <form action="action_update_job.php" method="post">

                        <input type="hidden"
                            name="id_job"
                            value="<?php echo $job->id_training ?>">

                        <div class="mb-3">
                            <label class="form-label">Profession</label>

                            <input type="text"
                                class="form-control"
                                name="nama_pekerjaan"
                                value="<?php echo $job->nama_pekerjaan ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year</label>

                            <input type="text"
                                class="form-control"
                                name="tahun_pekerjaan"
                                value="<?php echo $job->tahun_training ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Place</label>

                            <input type="text"
                                class="form-control"
                                name="tempat_pekerjaan"
                                value="<?php echo $job->tempat_training ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Responsibilities</label>

                            <textarea name="deskripsi"
                                class="form-control"
                                rows="10"><?php echo $job->deskripsi ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                    </form>

                </div>

            </div>

            <?php include "footer.php" ?>

        </div>

    </div>

    <?php include "buttom.php" ?>

</body>