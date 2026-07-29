<?php include "header.php"; ?>

<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php"; ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800">Add Reference</h1>

                    <form action="action_insert_reference.php" method="POST">

                        <div class="form-group mb-4">
                            <label class="text-secondary">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-secondary">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary px-4 mt-2">Submit</button>

                    </form>

                </div>

            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <?php include "buttom.php"; ?>

</body>

</html>