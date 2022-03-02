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
                    <h1 class="h2 mt-3 mb-2 text-gray-800" style="text-align:center;">DATA PAKET CUCI</h1>
                    <hr>
                    <h5>Cari data paket cuci :</h5>
                    <form action="tampil_paket.php" method="POST" class="w-100 d-none d-md-inline-block form-inline mb-3">
                        <div class="input-group">
                            <input class="form-control" type="text" name="cari" placeholder="Masukkan keyword id / jenis" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <h6 class="mb-4">*Masukkan keyword dan klik ikon search/enter<br>*Kosongkan dan klik ikon search/enter unutk menampilkan semmua data</h6>
                    <div class="card shadow mt-4 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Paket Cuci</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID PAKET</th>
                                            <th scope="col">JENIS PAKET</th>
                                            <th scope="col">HARGA PAKET</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "koneksi.php";
                                        if (isset($_POST["cari"])) {
                                            // if ($_POST["cari"] != NULL)
                                            // jika ada keyword pencarian
                                            $cari = $_POST["cari"];
                                            $query_paket = mysqli_query($koneksi, "SELECT * FROM paket WHERE 
                                                           id_paket = '$cari' OR jenis LIKE '%$cari%'");
                                        } else {
                                            // jika tdk ada keyword pencarian
                                            $query_paket = mysqli_query($koneksi, "SELECT * FROM paket");
                                        }

                                        while ($data_paket = mysqli_fetch_array($query_paket)) { ?>
                                            <tr>
                                                <td><?= $data_paket['id_paket']; ?></td>
                                                <td><?= $data_paket['jenis']; ?></td>
                                                <td><?= $data_paket['harga']; ?></td>
                                                <td>
                                                    <a href="ubah_paket.php?id_paket=<?php echo $data_paket['id_paket'] ?>" class="btn btn-success btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Edit</span>
                                                    </a>
                                                    <a href="hapus_paket.php?id_paket=<?php echo $data_paket['id_paket'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
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