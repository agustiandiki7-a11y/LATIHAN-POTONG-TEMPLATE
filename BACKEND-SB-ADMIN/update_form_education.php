<?php
include "connection.php";

$id = $_GET['id_education'];

$query = mysqli_query($koneksi, "SELECT * FROM education WHERE id_education='$id'");
$data = mysqli_fetch_assoc($query);
?>

<?php include "header.php" ?>

<body id="page-top">

<div id="wrapper">

<?php include "sidebar.php" ?>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">

<?php include "topbar.php" ?>

<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800">Update Education</h1>

<form action="action_update_education.php" method="POST">
    
    <input type="hidden" name="id_education" value="<?php echo $data['id_education']; ?>">

    <div class="form-group">
        <label>Major</label>
        <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan']; ?>">
    </div>

    <div class="form-group">
        <label>Year</label>
        <input type="text" name="tahun_belajar" class="form-control" value="<?php echo $data['tahun_belajar']; ?>">
    </div>

    <div class="form-group">
        <label>Place</label>
        <input type="text" name="temapat_belajar" class="form-control" value="<?php echo $data['temapat_belajar']; ?>">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="deskripsi" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">UPDATE</button>
</form>

</div>

</div>
</div>
</div>

<?php include "footer.php" ?>
<?php include "bottom.php" ?>