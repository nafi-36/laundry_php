<?php
    $nama_admin = $_POST["nama_admin"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "koneksi.php";
    $query = "INSERT INTO admin (nama_admin, username, password) VALUES 
             ('".$nama_admin."', '" . $username . "', '" . md5( $password) . "')";
    $tambah = mysqli_query($koneksi, $query);

    if ($tambah) {
        echo "<script>alert('Berhasil menambahkan admin');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal menambahkan admin');location.href='register.php';</script>";
    }
?>