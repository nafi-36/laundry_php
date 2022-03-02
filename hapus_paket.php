<?php
    include "koneksi.php";
    if ($_GET['id_paket']) {
        
        $id_paket = $_GET['id_paket'];
        
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM paket WHERE id_paket = '".$id_paket."'");
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus paket cuci');location.href='tampil_paket.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus paket cuci');location.href='tampil_paket.php';</script>";
        }
    }
?>