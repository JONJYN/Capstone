<?php
session_start();
if(isset($_SESSION['login'])){
    include "connect.php";
    $clear = mysqli_query($connect, "DELETE FROM guru WHERE idguru = '$_GET[id]'");

    if($clear){
        header("location: show_guru.php");
    } else{
        echo "Hapus data gagal, data guru digunakan di tabel wali kelas<br>
                <a href='show_guru.php'><<< Kembali</a>";
    }
} else {
    echo "Anda tidak memiliki hak akses ke halaman ini";
}
?>