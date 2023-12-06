<?php
session_start();
if(isset($_SESSION['login'])){
    include "connect.php";
    $clear = mysqli_query($connect, "DELETE FROM walikelas WHERE kelas = '$_GET[kls]'");

    if($clear){
        header("location: show_walikelas.php");
    } else{
        echo "Hapus data gagal, mungkin karena sedang digunakan pada tabel lain....<br>
                <a href='show_walikelas.php'><<< Kembali</a>";
    }
} else {
    echo "Anda tidak memiliki hak akses ke halaman ini";
}
?>