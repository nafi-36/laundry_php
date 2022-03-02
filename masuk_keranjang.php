<?php
    session_start();
    if ($_POST) {
        include "koneksi.php";
        
        $id_member = $_POST['id_member'];

        $query_get_paket = mysqli_query($koneksi, "SELECT * FROM paket where id_paket = '" . $_POST['jenis'] . "'");
        $data_paket = mysqli_fetch_array($query_get_paket);

        $_SESSION['keranjang'][] = array(
            'id_paket' => $data_paket['id_paket'],
            'jenis' => $data_paket['jenis'],
            'harga' => $data_paket['harga'],
            'qty' => $_POST['jumlah'],
        );
        $_SESSION['id_member'] = $id_member;
    }
    header('location: keranjang.php');
?>