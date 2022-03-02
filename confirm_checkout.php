<?php
    session_start();
    include "koneksi.php";

    $id_mem = $_POST['id_mem'];
    $tgl = $_POST['tgl'];
    $batas_waktu = $_POST['batas_waktu'];
    // $tgl_bayar = $_POST['tgl_bayar'];
    $status = $_POST['status'];
    $dibayar = $_POST['dibayar'];

    $keranjang = @$_SESSION['keranjang'];
    if (count($keranjang) > 0) {
        $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_member, tgl, batas_waktu, status, dibayar, id_admin)
        VALUES ('".$id_mem."', '".$tgl."', '".$batas_waktu."', '".$status."', '".$dibayar."', '".$_SESSION['id_admin']."')");
        
        //  $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_member, tgl, batas_waktu, tgl_bayar, status, dibayar, id_admin)
        //  VALUES ('".$id_mem."', '".$tgl."', '".$batas_waktu."', '".$tgl_bayar."', '".$status."', '".$dibayar."', '".$_SESSION['id_admin']."')");
 
        if ($query_transaksi) {
            $id = mysqli_insert_id($koneksi);
            foreach ($keranjang as $key => $value) {
                $qty = $value['qty'];
                $harga = $value['harga'];
                $subtotal = $qty*$harga;
                mysqli_query($koneksi, "INSERT INTO detail_transaksi (id_transaksi, id_paket, qty, subtotal)
                VALUES ('".$id."', '".$value['id_paket']."', '".$qty."', '".$subtotal."')");
            }
            unset($_SESSION['keranjang']);
            //unset($_SESSION['id_member']);
            echo "<script>alert('Berhasil checkout laundry');location.href='transaksi.php'</script>";
        }
        else{
            echo "<script>alert('Gagal checkout laundry');location.href='confirm_checkout.php'</script>";
            //var_dump($_SESSION['keranjang']);
        }
    }
?>