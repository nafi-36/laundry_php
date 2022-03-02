<?php 
    $id_admin = $_POST['id_admin']; 
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "koneksi.php";
    $update = mysqli_query($koneksi, "UPDATE admin SET nama_admin = '{$nama_admin}',
                                                         username = '{$username}',
                                                         password = '".md5($password)."'
                                      WHERE id_admin = '{$id_admin}'");
    if ($update) {
        echo "<script>alert('Sukses edit profil');location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Gagal edit profil');location.href='ubah_admin.php?id_admin=".$id_admin."';</script>";
    }
?>