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
                    <h1 class="h2 mt-3 mb-2 text-gray-800" style="text-align:center;">TRANSAKSI</h1>
                    <hr>
                    <h5>Cari member :</h5>
                    <form action="pilih_member.php" method="POST" class="w-100 d-none d-md-inline-block form-inline mb-3">
                        <div class="input-group">
                            <input class="form-control" type="text" name="cari" placeholder="Masukkan keyword id / jenis" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <h6 class="mb-4">*Masukkan keyword dan klik ikon search/enter<br>*Kosongkan dan klik ikon search/enter unutk menampilkan semmua data</h6>
                    <div class="card shadow mt-4 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Member</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID MEMBER</th>
                                            <th scope="col">NAMA MEMBER</th>
                                            <th scope="col">TRANSAKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "koneksi.php";
                                        if (isset($_POST["cari"])) {
                                            // if ($_POST["cari"] != NULL)
                                            // jika ada keyword pencarian
                                            $cari = $_POST["cari"];
                                            $query_member = mysqli_query($koneksi, "SELECT * FROM member WHERE 
                                                           id_member = '$cari' OR nama_member LIKE '%$cari%'");
                                        } else {
                                            // jika tdk ada keyword pencarian
                                            $query_member = mysqli_query($koneksi, "SELECT * FROM member");
                                        }

                                        while ($data_member = mysqli_fetch_array($query_member)) { ?>
                                            <tr>
                                                <td><?= $data_member['id_member']; ?></td>
                                                <td><?= $data_member['nama_member']; ?></td>
                                                <td>
                                                    <a href="pilih_laundry.php?id_member=<?= $data_member['id_member'] ?>" class="btn btn-secondary btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">Confirm</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
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