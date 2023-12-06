<?php
session_start();
if(isset($_SESSION['login'])){
    include "connect.php";
    $clear = mysqli_query($connect, "DELETE FROM siswa WHERE idsiswa = '$_GET[id]'");

    if($clear){
        header("location: show_siswa.php");
    } else{
        echo "Hapus data gagal<br>
                <a href='show_siswa.php'><<< Kembali</a>";
    }
} else {
    echo "Anda tidak memiliki hak akses ke halaman ini";
}
?>