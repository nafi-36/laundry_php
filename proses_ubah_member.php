<?php
    include "koneksi.php";
    
    $id_member = $_POST['id_member']; 
    $nama_member = $_POST['nama_member'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tlp = $_POST['tlp'];

    $update = mysqli_query($koneksi, "UPDATE member SET nama_member = '".$nama_member."',
                                                        alamat = '".$alamat."',
                                                        jenis_kelamin = '".$jenis_kelamin."', 
                                                        tlp = '".$tlp."'
                                      WHERE id_member = '".$id_member."'");
    if ($update) {
        echo "<script>alert('Sukses edit member');location.href='tampil_member.php';</script>";
    } else {
        echo "<script>alert('Gagal edit member');location.href='ubah_member.php?id_member=".$id_member."';</script>";
    }
?>