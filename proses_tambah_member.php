<?php
    include "koneksi.php";

    $nama_member = $_POST["nama_member"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tlp = $_POST["tlp"];

    $query = "INSERT INTO member (nama_member, alamat, jenis_kelamin, tlp)
             VALUES ('".$nama_member."', '".$alamat."', '".$jenis_kelamin."', '".$tlp."')";
    $tambah = mysqli_query($koneksi, $query);
    if ($tambah) {
        echo "<script>alert('Berhasil menambahkan member');location.href='tambah_member.php';</script>";
    }
    else {
        echo "<script>alert('Gagal menambahkan member');location.href='tambah_member.php';</script>";
    }
?>