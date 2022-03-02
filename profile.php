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
    $query_profil = mysqli_query(
        $koneksi,
        "SELECT * FROM admin WHERE id_admin = '" . $_SESSION['id_admin'] . "'"
    );
    $data_admin = mysqli_fetch_array($query_profil);
    ?>
    <?php include "navbar_top.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div id="layoutSidenav_nav">
                <?php include "navbar.php"; ?>
            </div>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h1 class="text-muted font-semibold">Profile</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <section class="container">
                                    <div class="col">
                                        <form action=""><input type="hidden" name="id_admin" value="<?= $data_admin['id_admin'] ?>"></form>
                                        <table class="table table-striped">
                                            <thead style="text-align: left;">
                                                <tr>
                                                    <td>
                                                        <h5>Id</h5>
                                                    </td>
                                                    <td>:</td>
                                                    <td><?= $data_admin['id_admin'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5>Nama</h5>
                                                    </td>
                                                    <td>:</td>
                                                    <td><?= $data_admin['nama_admin'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5>Username</h5>
                                                    </td>
                                                    <td>:</td>
                                                    <td><?= $data_admin['username'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5>Password</h5>
                                                    </td>
                                                    <td>:</td>
                                                    <td><?= $data_admin['password'] ?><span style="color: red;"> *password disamarkan</span></td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div style="float: right;">
                                        <a href="ubah_admin.php?id_admin=<?= $data_admin['id_admin']; ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Edit Profile</span>
                                        </a>
                                        <a href="hapus_admin.php?id_admin=<?php echo $data_admin['id_admin'] ?>" onclick="return confirm('Apakah anda yakin menghapus akun ini?')" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </section>
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