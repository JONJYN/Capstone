<?php
session_start();
if(isset($_SESSION['login'])){
    include "connect.php";
    if($_GET['act'] == 'bayar'){
        $idspp = $_GET['id'];
        $nis = $_GET['nis'];
        
        //Generate nomor pembayaran
        $today = date("ymd");
        $query = mysqli_query($connect, "SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%'");
        $data = mysqli_fetch_array($query);
        $lastNoBayar = $data['last'];
        $lastNoUrut = substr($lastNoBayar, 6, 4);
        $nextNoUrut = (int)$lastNoUrut + 1;
        $nextNoBayar = $today.sprintf("%04s", $nextNoUrut);

        //Payment Date
        $tglBayar = date('Y-m-d');

        //Id Admin
        $admin = $_SESSION['id'];

        mysqli_query($connect, "UPDATE spp SET nobayar = '$nextNoBayar',
                                                tglbayar = '$tglBayar',
                                                ket = 'LUNAS',
                                                idadmin = '$admin'
                                            WHERE idspp = '$idspp'");
        
        header('location: transaksi.php?nis='.$nis);
    }
}
?>