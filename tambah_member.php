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
                                    <h3 class="text-center font-weight-light mt-3 mb-3">Form Tambah Member</h3>
                                </div>
                                <div class="card-body">
                                    <form action="proses_tambah_member.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputName" type="text" name="nama_member" placeholder="Nama" required>
                                            <label for="inputName">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="inputAlamat" name="alamat" placeholder="Alamat" required></textarea>
                                            <label for="inputAlamat">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="inputJk" type="" name="jenis_kelamin" placeholder="Jenis Kelmain" required>
                                                <option></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <label for="inputJk">Jenis Kelamin</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputTlp" type="number" name="tlp" placeholder="Masukkan telepon member" required>
                                            <label for="inputTlp">Telepon</label>
                                        </div>
                                        <button class="w-100 btn btn-lg btn-primary" type="submit">Tambah Member</button>
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