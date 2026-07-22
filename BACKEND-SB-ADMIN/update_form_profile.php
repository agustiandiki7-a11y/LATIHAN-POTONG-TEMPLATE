<?php
include "connection.php";

// Mengecek apakah id_profile ada di URL
if (!isset($_GET['id_profile'])) {
    header("Location: tabel_profile.php");
    exit;
}

// Mengambil id_profile dari tabel_profile.php
$id_profile = $_GET['id_profile'];

// Mengambil data profile berdasarkan id_profile
$select_id = mysqli_query(
    $koneksi,
    "SELECT * FROM profile WHERE id_profile='$id_profile'"
);


// Mengubah hasil query menjadi object
$profile = mysqli_fetch_object($select_id);

// Jika data tidak ditemukan
if (!$profile) {
    die("Data profile tidak ditemukan");
}
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

                    <h1 class="h3 mb-4 text-gray-800">
                        Update Profile
                    </h1>

                    <form action="action_update_profile.php" method="POST">

                        <!-- Hidden ID -->
                        <input
                            type="hidden"
                            name="id_profile"
                            value="<?php echo $profile->id_profile; ?>">

                        <!-- Nama -->
                        <div class="form-group">
                            <label>Nama</label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->nama); ?>"
                                required>
                        </div>

                        <!--overvew-->
                        <div class="form-group">
                            <label>Nama</label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->nama); ?>"
                                required>
                        </div>

                        <!-- About -->
                        <div class="form-group">
                            <label>About</label>

                            <textarea
                                name="about"
                                class="form-control"
                                rows="5"
                                required><?php echo htmlspecialchars($profile->about); ?></textarea>
                        </div>

                        <!-- Website -->
                        <div class="form-group">
                            <label>Website</label>

                            <input
                                type="text"
                                name="website"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->website); ?>">
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label>Phone</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->phone); ?>">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->email); ?>"
                                required>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label>Address</label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="4"><?php echo htmlspecialchars($profile->address); ?></textarea>
                        </div>

                        <!-- LinkedIn -->
                        <div class="form-group">
                            <label>LinkedIn</label>

                            <input
                                type="text"
                                name="linkedin"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->linkedin); ?>">
                        </div>

                        <!-- Nationality -->
                        <div class="form-group">
                            <label>Nationality</label>

                            <input
                                type="text"
                                name="nationalty"
                                class="form-control"
                                value="<?php echo htmlspecialchars($profile->nationalty); ?>">
                        </div>

                        <!-- Tombol Update -->
                        <button
                            type="submit"
                            name="update"
                            class="btn btn-primary">

                            Update Data
                        </button>

                        <!-- Tombol Kembali -->
                        <a
                            href="tabel_profile.php"
                            class="btn btn-secondary">

                            Kembali
                        </a>

                    </form>

                </div>
                <!-- End Container Fluid -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <?php include "buttom.php"; ?>
