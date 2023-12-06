<?php
//Connect Variable
$connect = mysqli_connect("localhost", "root", "", "sppbeerseba");

if(!$connect){
    echo "Failed connect to the database!";
}
?>