<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laundry Service</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" style="background: cornflowerblue;">
    <?php
    include "koneksi.php";
    $qry_get_admin = mysqli_query(
        $koneksi,
        "SELECT * FROM admin WHERE id_admin = '" . $_GET['id_admin'] . "'"
    );
    $dt_admin = mysqli_fetch_array($qry_get_admin);
    ?>
    <?php include "navbar_top.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light mt-2 mb-4">Edit Admin Account</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <form action="proses_ubah_admin.php" method="POST">
                                        <input type="hidden" name="id_admin" value="<?= $dt_admin['id_admin'] ?>">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nama</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" name="nama_admin" value="<?= $dt_admin['nama_admin'] ?>" class="form-control" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Username</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="email" name="username" class="form-control" value="<?= $dt_admin['username'] ?>" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Password</label>
                                                </div>
                                                <div class="col-md-8 form-group mb-5">
                                                    <input class="form-control" type="password" name="password" value="<?= $dt_admin['password'] ?>" required>
                                                </div>
                                                <hr>
                                                <div class="col-sm-12">
                                                    <a class="w-100 btn btn-primary mb-3" href="profile.php" role="button">Back</a>
                                                    <button type="submit" class="w-100 btn btn-primary">Edit Admin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php
            include "footer.php";
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>