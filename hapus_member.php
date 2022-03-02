<?php
    include "koneksi.php";
    if ($_GET['id_member']) {
        
        $id_member = $_GET['id_member'];
        
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM member WHERE id_member = '".$id_member."'");
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus member');location.href='tampil_member.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus member');location.href='tampil_member.php';</script>";
        }
    }
?>