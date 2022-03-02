<?php
    include "koneksi.php";
    
    $id_transaksi = $_POST['id_transaksi'];
    $status = $_POST['status'];
    $dibayar = $_POST['dibayar'];

    $update = mysqli_query($koneksi, "UPDATE transaksi SET status = '".$status."', dibayar = '".$dibayar."'
                                          WHERE id_transaksi = '".$id_transaksi."'");

    if ($update) {
        if ($_POST['dibayar'] == "Lunas") { 
            $tgl = date('Y-m-d');
            mysqli_query($koneksi, "UPDATE transaksi SET tgl_bayar = '".$tgl."'
                                    WHERE id_transaksi = '".$id_transaksi."'");
        } else {
            mysqli_query($koneksi, "UPDATE transaksi SET tgl_bayar = NULL
                                    WHERE id_transaksi = '".$id_transaksi."'");             
        }
        echo "<script>alert('Sukses edit transaksi');location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal edit transaksi');location.href='detail_transaksi.php?id_transaksi=".$id_transaksi."';</script>";
    }   
?> 