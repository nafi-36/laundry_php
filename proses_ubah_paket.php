<?php
    include "koneksi.php";
    
    $id_paket = $_POST['id_paket']; 
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $update = mysqli_query($koneksi, "UPDATE paket SET jenis = '".$jenis."',
                                                       harga = '".$harga."'
                                      WHERE id_paket = '".$id_paket."'");
    if ($update) {
        echo "<script>alert('Sukses edit paket cuci');location.href='tampil_paket.php';</script>";
    } else {
        echo "<script>alert('Gagal edit paket cuci');location.href='ubah_paket.php?id_paket=".$id_paket."';</script>";
    }
?>