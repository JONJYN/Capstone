<?php
session_start();
if (isset($_SESSION['login'])) {
    include "connect.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script src="./assets/js/color-modes.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Laporan Data Siswa</title>
        <style type="text/css">
            @media print {
                #btn {
                    display: none;
                }
            }
        </style>
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
        <div class="col-lg-10 mx-auto p-4 py-md-5">
            <center>
                <h3>LAPORAN DATA SISWA</h3>
                <hr />
            </center>
            <table class="table align-middle text-center table-bordered" border="1" width="100%" align="center">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                </tr>
                <?php
                $sqlSiswa = mysqli_query($connect, "SELECT * FROM siswa ORDER BY nis ASC");
                $num = 1;
                while ($data = mysqli_fetch_array($sqlSiswa)) {
                    echo "<tr>
                <td>$num</td>
                <td>$data[nis]</td>
                <td align='left'>$data[namasiswa]</td>
                <td>$data[kelas]</td>
                <td>$data[tahunajaran]</td>
            </tr>";
                    $num++;
                }
                ?>
            </table>

            <table width="100%">
                <tr>
                    <td></td>
                    <td width="200px">
                        <p>Pekanbaru, <?php echo date('d/m/Y'); ?><br />
                            Kepala Sekolah,</p>
                        <br />
                        <br />
                        <p>________________________________________</p>
                    </td>
                </tr>
            </table>
            <a href="#" id="btn" class="btn btn-primary" onclick="window.print();">Cetak/Print</a>
        </div>
    </body>

    </html>


<?php
} else {
    header("location: login.php");
}
?>