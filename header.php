<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}

include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head> <script src="./assets/js/color-modes.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Aplikasi SPP</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="./assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="./assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="./assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="./assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="./assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="./assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <!-- Custom styles for this template -->
    <link href="./assets/custom.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container-fluid">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                    <span class="fs-4">SD BEERSEBA</span>
                </a>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="show_admin.php" class="nav-link">Data Admin</a></li>
                    <li class="nav-item"><a href="show_guru.php" class="nav-link">Data Guru</a></li>
                    <li class="nav-item"><a href="show_walikelas.php" class="nav-link">Data Wali Kelas</a></li>
                    <li class="nav-item"><a href="show_siswa.php" class="nav-link">Data Siswa</a></li>
                    <li class="nav-item"><a href="transaksi.php" class="nav-link">Transaksi</a></li>
                    <li class="nav-item"><a href="laporan.php" class="nav-link">Laporan</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
            </header>
        </div>
    </main>
    <script src="./assets/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>