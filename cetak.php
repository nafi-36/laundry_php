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
    $qry_get = mysqli_query(
        $koneksi,
        "SELECT * FROM transaksi WHERE id_transaksi = '" . $_GET['id_transaksi'] . "'"
    );
    $dt_transaksi = mysqli_fetch_array($qry_get);
    ?>
    <?php include "navbar_top.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <h1 class="h2 mt-3 mb-2 text-gray-800" style="text-align:center;">DETAIL TRANSAKSI</h1>
                    <hr>
                    <div class="card shadow mt-4 mb-3">
                        <!-- <div class="card-header py-3 mt-2">
                        </div> -->
                        <div class="container" style="padding: 30px;">
                            <form action="ubah_detail.php" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Id Transaksi</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="number" name="id_transaksi" value="<?= $dt_transaksi['id_transaksi'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Id Member</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="number" name="id_member" value="<?= $dt_transaksi['id_member'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nama Member</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <?php 
                                        $qry = mysqli_query($koneksi, "SELECT * FROM member WHERE id_member = '". $dt_transaksi['id_member'] ."'");
                                        $dt = mysqli_fetch_array($qry); 
                                        ?>
                                        <input class="form-control" type="text" name="nama_member" value="<?= $dt['nama_member'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tanggal Transaksi</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="date" name="tgl" value="<?= $dt_transaksi['tgl'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tanggal Batas Waktu</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="date" name="batas_waktu" value="<?= $dt_transaksi['batas_waktu'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tanggal Bayar</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="date" name="tgl_bayar" value="<?= $dt_transaksi['tgl_bayar'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status Order</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="text" name="status" value="<?= $dt_transaksi['status'] ?>" readonly>
                                        <!-- <?php $arr_status = array('Proses' => 'Proses', 'Selesai' => 'Selesai', 'Diambil' => 'Diambil'); ?>
                                        <select name="status" class="form-control" required>
                                            <option></option>
                                            <?php foreach ($arr_status as $key_status => $val_status) {
                                                if ($key_status == $dt_transaksi['status']) {
                                                    $selek = "selected";
                                                } else {
                                                    $selek = "";
                                                } 
                                                ?>
                                                <option value="<?= $val_status ?>" <?= $selek ?>><?= $val_status ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status Bayar</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="text" name="tgl_bayar" value="<?= $dt_transaksi['dibayar'] ?>" readonly>
                                        <!-- <?php $arr_bayar = array('Lunas' => 'Lunas', 'Belum Bayar' => 'Belum Bayar'); ?>
                                        <select name="dibayar" class="form-control" required>
                                            <option></option>
                                            <?php foreach ($arr_bayar as $key_bayar => $val_bayar) {
                                                if ($key_bayar == $dt_transaksi['dibayar']) {
                                                    $selek = "selected";
                                                } else {
                                                    $selek = "";
                                                } ?>
                                                <option value="<?= $val_bayar ?>" <?= $selek ?>><?= $val_bayar ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>
                                    <div class="col-md-4">
                                        <label>Id Admin</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input class="form-control" type="number" value="<?= $dt_transaksi['id_admin'] ?>" disabled>
                                    </div>
                                    <!-- <div class="col-sm-12 mt-3">
                                        <button type="submit" class="w-100 btn btn-primary">Simpan Perubahan</button>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id Transaksi</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <!-- <th scope="col">Id Member</th> -->
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
                                                <td><?= $data['id_transaksi'] ?></td>
                                                <td><?= $data['tgl'] ?></td>
                                                <!-- <td><?= $data['id_member'] ?></td> -->
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
                                                    echo "<label class='alert alert-secondary'>Rp. " . $data_bayar['total'] . "</label>";
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="transaksi.php" class="btn btn-primary">Back</a>
                            <a href="cetak_transaksi.php?id_transaksi=<?=$_GET['id_transaksi']?>" target="_blank" class='btn btn-secondary'>Cetak Transaksi</a>
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