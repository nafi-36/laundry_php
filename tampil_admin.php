<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: cornflowerblue;">
    <div class="container">
        <h1 class="h2 mt-3 mb-2 text-gray-800" style="text-align:center;">DATA ADMIN</h1>
        <hr>
        <h5>Cari data admin :</h5>
        <form action="tampil_admin.php" method="POST" class="w-100 d-none d-md-inline-block form-inline mb-3">
            <div class="input-group">
                <input class="form-control" type="text" name="cari" placeholder="Masukkan keyword id / nama" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <h6 class="mb-4">*Masukkan keyword dan klik ikon search/enter<br>*Kosongkan dan klik ikon search/enter unutk menampilkan semmua data</h6>
        <a class="btn btn-primary" href="index.php" role="button">Back to Login</a>
        <div class="card shadow mt-4 mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Admin</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">ID ADMIN</th>
                                <th scope="col">NAMA ADMIN</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">PASSWORD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "koneksi.php";
                            if (isset($_POST["cari"])) {
                                // if ($_POST["cari"] != NULL)
                                // jika ada keyword pencarian
                                $cari = $_POST["cari"];
                                $query_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE 
                                               id_admin = '$cari' OR nama_admin LIKE '%$cari%'");
                            } else {
                                // jika tdk ada keyword pencarian
                                $query_admin = mysqli_query($koneksi, "SELECT * FROM admin");
                            }

                            while ($data_admin = mysqli_fetch_array($query_admin)) { ?>
                                <tr>
                                    <td><?= $data_admin['id_admin']; ?></td>
                                    <td><?= $data_admin['nama_admin']; ?></td>
                                    <td><?= $data_admin['username']; ?></td>
                                    <td><?= $data_admin['password']; ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>