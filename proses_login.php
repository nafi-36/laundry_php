<?php
    if ($_POST) {
        include "koneksi.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
     
        $query_login = mysqli_query($koneksi, "SELECT * FROM admin WHERE 
                       username = '" . $username . "' AND password = '" . md5($password) . "'");

        if (mysqli_num_rows($query_login)>0) {
            $data_login = mysqli_fetch_array($query_login);
            // memulai session
            session_start();
            $_SESSION['id_admin'] = $data_login['id_admin'];
            $_SESSION['nama_admin'] = $data_login['nama_admin'];
            $_SESSION['status_login'] = true;
            echo "<script>alert('Login Berhasil');location.href='home.php';</script>";
        } else {
            echo "<script>alert('Login Gagal');location.href='index.php';</script>";
        }
    } 
?>
