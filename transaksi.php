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
                    <h1 class="h2 mt-3 mb-2 text-gray-800" style="text-align:center;">HISTORY TRANSAKSI</h1>
                    <hr>
                    <div class="card shadow mt-4 mb-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Histori Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Id Transaksi</th>
                                            <th scope="col">Id Member</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th scope="col">Batas Waktu</th>
                                            <th scope="col">Tanggal Bayar</th>
                                            <th scope="col">Status Order</th>
                                            <th scope="col">Status Bayar</th>
                                            <th scope="col">Id Admin</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php
                                        include "koneksi.php";
                                        $qry = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");
                                        $no = 0;
                                        while ($data = mysqli_fetch_array($qry)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $data['id_transaksi'] ?></td>
                                                <td><?= $data['id_member'] ?></td>
                                                <td><?= $data['tgl'] ?></td>
                                                <td><?= $data['batas_waktu'] ?></td>
                                                <td><?= $data['tgl_bayar'] ?></td>
                                                <td><?php
                                                    include "koneksi.php";
                                                    if ($data['status'] == "Baru") {
                                                        echo "<button class='w-100 btn btn-danger'>" . $data['status'] . "</button>";
                                                    } else if ($data['status'] == "Proses") {
                                                        echo "<button class='w-100 btn btn-warning'>" . $data['status'] . "</button>";
                                                    } else if ($data['status'] == "Selesai") {
                                                        echo "<button class='w-100 btn btn-success'>" . $data['status'] . "</button>";
                                                    } else if ($data['status'] == "Diambil") {
                                                        echo "<button class='w-100 btn btn-primary'>" . $data['status'] . "</button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    include "koneksi.php";
                                                    if ($data['dibayar'] == "Belum Bayar") {
                                                        echo "<button class='w-100 btn btn-danger'>" . $data['dibayar'] . "</button>";
                                                    } else if ($data['dibayar'] == "Lunas") {
                                                        echo "<button class='w-100 btn btn-success'>" . $data['dibayar'] . "</button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $data['id_admin'] ?></td>
                                                <!-- <td>
                                                    <ol>
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                                        JOIN paket p ON p.id_paket = d.id_paket WHERE id_transaksi = '" . $data['id_transaksi'] . "'");
                                                        while ($data_detail = mysqli_fetch_array($qry_detail)) {
                                                            echo "<li>" . $data_detail['jenis'] . "</li>";
                                                        }
                                                        ?>
                                                    </ol>
                                                </td>
                                                <td>
                                                    <ul style="list-style: none;">
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                                        JOIN paket p ON p.id_paket = d.id_paket WHERE id_transaksi = '" . $data['id_transaksi'] . "'");
                                                        while ($data_detail = mysqli_fetch_array($qry_detail)) {
                                                            echo "<li>" . $data_detail['qty'] . " Kg" . "</li>";
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul style="list-style: none;">
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                                        JOIN paket p ON p.id_paket = d.id_paket WHERE id_transaksi = '" . $data['id_transaksi'] . "'");
                                                        while ($data_detail = mysqli_fetch_array($qry_detail)) {
                                                            echo "<li>" . $data_detail['subtotal'] / $data_detail['qty'] . "</li>";
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul style="list-style: none;">
                                                        <?php
                                                        include "koneksi.php";
                                                        $qry_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                                        JOIN paket p ON p.id_paket = d.id_paket WHERE id_transaksi = '" . $data['id_transaksi'] . "'");
                                                        while ($data_detail = mysqli_fetch_array($qry_detail)) {
                                                            echo "<li>" . $data_detail['subtotal'] . "</li>";
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <?php
                                                    include "koneksi.php";
                                                    $qry_bayar = mysqli_query($koneksi, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                                                    WHERE id_transaksi = '" . $data['id_transaksi'] . "'");
                                                    $data_bayar = mysqli_fetch_array($qry_bayar);
                                                    echo "<label class='w-100 alert alert-secondary'>Rp. " . $data_bayar['total'] . "</label>";
                                                    ?>
                                                </td> -->
                                                <td><?php
                                                    include "koneksi.php";
                                                    if ($data['status'] != "Diambil" && $data['dibayar'] == "Belum Bayar") {
                                                        echo "<a href='detail_transaksi.php?id_transaksi=$data[id_transaksi]' class='w-100 btn btn-primary mb-2'>" . "Edit" . "</button>";
                                                    } else if ($data['status'] != "Diambil" && $data['dibayar'] == "Lunas") {
                                                        echo "<a href='detail_transaksi.php?id_transaksi=$data[id_transaksi]' class='w-100 btn btn-primary mb-2'>" . "Edit" . "</button>";
                                                    } else if ($data['status'] == "Diambil" && $data['dibayar'] == "Belum Bayar") {
                                                        echo "<a href='detail_transaksi.php?id_transaksi=$data[id_transaksi]' class='w-100 btn btn-primary mb-2'>" . "Edit" . "</button>";
                                                    } else if ($data['status'] == "Diambil" && $data['dibayar'] == "Lunas") {
                                                        echo "<a href='cetak.php?id_transaksi=$data[id_transaksi]' class='w-100 btn btn-secondary'>" . "Detail" . "</button>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
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