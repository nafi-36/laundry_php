<?php
    $serverName = "localhost";
    $userName = "root";
    $passWord = "";
    $database = "laundry";

    // buat koneksi
    $koneksi = mysqli_connect($serverName, $userName, $passWord, $database);

    // // cek koneksi
    // if (!$koneksi) {
    //     die("Koneksi Gagal".mysqli_connect_error());
    // }
    // else {
    //     echo "Koneksi Berhasil";
    // }
?>