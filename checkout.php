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
                                    <form action="confirm_checkout.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Id Member</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="number" name="id_mem" value="<?= $_SESSION['id_member'] ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Transaksi</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="tgl" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Batas Waktu Laundry</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="date" name="batas_waktu" required>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <label>Tanggal Bayar</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="date" name="tgl_bayar" readonly>
                                            </div> -->
                                            <div class="col-md-4">
                                                <label>Status Order</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-control" type="" name="status" readonly>   
                                                    <!-- <option></option> -->
                                                    <option value="Baru">Baru</option>
                                                    <!-- <option value="Proses">Proses</option>
                                                    <option value="Selesai">Selesai</option>
                                                    <option value="Diambil">Diambil</option> -->
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status Bayar</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-control" type="" name="dibayar" readonly>
                                                    <!-- <option></option> -->
                                                    <!-- <option value="Lunas">Lunas</option> -->
                                                    <option value="Belum Bayar">Belum Bayar</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Id Admin</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="number" value="<?= $_SESSION['id_admin'] ?>" disabled>
                                            </div>
                                            <hr>
                                            <div class="col-sm-12">
                                                <a class="w-100 btn btn-primary mb-3" href="keranjang.php" role="button">Back</a>
                                                <button type="submit" class="w-100 btn btn-primary">Confirm</button>
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