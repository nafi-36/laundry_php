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
    <?php include "navbar_top.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <h1 class="text-muted font-semibold" style="text-align: center;">Selamat Datang <br> Admin <?= $_SESSION['nama_admin'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="stats-icon blue" style="float:left;">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <?php
                                        include "koneksi.php";
                                        $sql = mysqli_query($koneksi, "SELECT * FROM member");
                                    ?>
                                    <h2 class="text-muted font-semibold">Total Member : <?= mysqli_num_rows($sql) ?></h2>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="stats-icon red" style="float:left;">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <?php
                                        include "koneksi.php";
                                        $sql_ttl = mysqli_query($koneksi, "SELECT SUM(subtotal) as total FROM detail_transaksi");
                                        $ttl = mysqli_fetch_array($sql_ttl);
                                    ?>
                                    <h2 class="text-muted font-semibold">Total Pendapatan : Rp. <?= $ttl['total'] ?>,-</h2>
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