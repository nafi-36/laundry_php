<?php
    include "koneksi.php";

    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];

    $query = "INSERT INTO paket (jenis, harga) VALUES ('".$jenis."', '".$harga."')";
    $tambah = mysqli_query($koneksi, $query);

    if ($tambah) {
        echo "<script>alert('Berhasil menambahkan paket cuci');location.href='tambah_paket.php';</script>";
    }
    else {
        echo "<script>alert('Gagal menambahkan paket cuci');location.href='tambah_paket.php';</script>";
    }
?>