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

<body>
    <?php
    include "koneksi.php";
    $qry_get = mysqli_query(
        $koneksi,
        "SELECT * FROM transaksi WHERE id_transaksi = '" . $_GET['id_transaksi'] . "'"
    );
    $dt_transaksi = mysqli_fetch_array($qry_get);
    ?>
    <main>
        <h1 style="text-align:center;">LAUNDRY SERVICE</h1>
        <h3 style="text-align:center;">Transaksi Laundry</h3>
        <hr>
        <table class="mb-4" style="margin: 50px;">
            <thead style="text-align: left;">
                <tr>
                    <td>Id Member</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['id_member'] ?></td>
                </tr>
                <tr>
                    <td>Nama Member</td>
                    <td>:</td>
                    <?php 
                        $qry = mysqli_query($koneksi, "SELECT * FROM member WHERE id_member = '". $dt_transaksi['id_member'] ."'");
                        $dt = mysqli_fetch_array($qry); 
                    ?>
                    <td><?= $dt['nama_member'] ?></td>
                </tr>
                <tr>
                    <td>Id Transaksi</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['id_transaksi'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['tgl'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Batas Waktu</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['batas_waktu'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['tgl_bayar'] ?></td>
                </tr>
                <tr>
                    <td>Status Order</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['status'] ?></td>
                </tr>
                <tr>
                    <td>Status Bayar</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['dibayar'] ?></td>
                </tr>
                <tr>
                    <td>Id Admin</td>
                    <td>:</td>
                    <td><?= $dt_transaksi['id_admin'] ?></td>
                </tr>
            </thead>
        </table>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Id Transaksi</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Id Member</th> -->
                            <th scope="col">Jenis Laundry</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Total</th>
                            <!-- <th scope="col">Bayar</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $id_transaksi = $_GET['id_transaksi'];
                        $qry = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '" . $id_transaksi . "'");
                        while ($data = mysqli_fetch_array($qry)) {
                        ?>
                            <tr>
                                <!-- <td><?= $data['id_transaksi'] ?></td>
                                <td><?= $data['tgl'] ?></td>
                                <td><?= $data['id_member'] ?></td> -->
                                <td>
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
                                    echo "Rp. " . $data_bayar['total'];
                                    ?>
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
    </div>
    </div>
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>