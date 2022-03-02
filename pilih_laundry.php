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
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light mt-2 mb-4">Form Transaksi Laundry</h3>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <form action="masuk_keranjang.php" method="POST">
                                        <div class="row">
                                            <input type="hidden" name="id_member" value="<?= $_GET['id_member'] ?>">
                                            <div class="col-md-4">
                                                <label>Id Member</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="number" value="<?= $_GET['id_member'] ?>" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jenis Paket</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-control" type="" name="jenis" placeholder="Jenis" required>
                                                    <option></option>
                                                    <?php
                                                    // fetch = mengconvert objek ke array, $qry_kelas = berbentuk objek
                                                    include "koneksi.php";
                                                    $qry_paket = mysqli_query($koneksi, "SELECT * FROM paket");
                                                    while ($data_paket = mysqli_fetch_array($qry_paket)) {
                                                        echo '<option value = "' . $data_paket['id_paket'] . '">' . $data_paket['jenis'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Berat Laundry (Kg)</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="number" value="1" name="jumlah" required>
                                                <h6 class="mt-2">*Berat tidak boleh >= 0</h6>
                                            </div>
                                            <hr>
                                            <div class="col-sm-12">
                                                <a class="w-100 btn btn-primary mb-3" href="keranjang.php" role="button">Kembali ke Keranjnag</a>
                                                <button type="submit" class="w-100 btn btn-primary">Continue</button>
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