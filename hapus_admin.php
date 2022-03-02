<?php
    include "koneksi.php";
    if ($_GET['id_admin']) {
        
        $id_admin = $_GET['id_admin'];
        
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '".$id_admin."'");
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus admin');location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus admin');location.href='profile.php';</script>";
        }
    }
?>