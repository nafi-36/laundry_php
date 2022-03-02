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
                    <h1 class="h2 mt-3 mb-2 text-gray-800" style="text-align:center;">KERANJANG LAUNDRY</h1>
                    <hr>
                    <div class="card shadow mt-4 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Keranjang Laundry</h6><hr>
                            <p style="color: red;">* Semua data keranjang hanya akan muncul sekali setelah berhasil menambahkan laundry dan akan hilang ketika Checkout / Logout</p>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                if (@$_SESSION['keranjang'] == null) {
                                    echo "Keranjang kosong";
                                    echo "<hr>";
                                } else {
                                ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NO.</th>
                                                <th scope="col">ID MEMBER</th>
                                                <th scope="col">ID PAKET</th>
                                                <th scope="col">PAKET LAUNDRY</th>
                                                <th scope="col">JUMLAH</th>
                                                <th scope="col">HARGA</th>
                                                <th scope="col">SUBTOTAL</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (@$_SESSION['keranjang'] as $key => $value) : ?>
                                                <tr>
                                                    <td><?= ($key + 1) ?></td>
                                                    <td><?= $_SESSION['id_member'] ?></td>
                                                    <td><?= $value['id_paket'] ?></td>
                                                    <td><?= $value['jenis'] ?></td>
                                                    <td><?= $value['qty'] ?> Kg</td>
                                                    <td><?= $value['harga'] ?></td>
                                                    <td><?= $value['harga']*$value['qty'] ?></td>
                                                    <td><a href="hapus_keranjang.php?id=<?= $key ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus list ini dari keranjang?')">Hapus</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <a href="checkout.php" type="button" class="btn btn-secondary">Checkout</a>
                                    <a href="pilih_laundry.php?id_member=<?= $_SESSION['id_member'] ?>" type="button" class="btn btn-secondary">Tambah Laundry</a>
                                <?php } ?>
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