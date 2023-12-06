<?php include "header.php";?>

<div class="container">
    <div class="page-header">
        <h3>Transaksi Pembayaran SPP</h3>
    </div>    
    <form method="get" action="">
        NIS: <input class="form-control" type="text" name="nis" />
        <input class="btn btn-success" type="submit" name="cari" value="Cari Siswa" />
    </form>

    <?php
    if(isset($_GET['nis']) && $_GET['nis'] != ''){
        $sqlSiswa = mysqli_query($connect, "SELECT * FROM siswa WHERE nis = '$_GET[nis]'");
        $dataSiswa = mysqli_fetch_array($sqlSiswa);
        $nis = $dataSiswa['nis'];
    ?>

    <h3>Biodata Siswa</h3>
    <table class="table align-middle" border="0">
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?php echo $dataSiswa['nis']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $dataSiswa['namasiswa']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?php echo $dataSiswa['kelas']; ?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?php echo $dataSiswa['tahunajaran']; ?></td>
        </tr>
    </table>

    <h3>Transaksi SPP Siswa</h3>
    <table class="table text-center align-middle table-bordered" border="1" width="auto">
        <thead class="align-middle">
            <tr>
                <td>No</td>
                <td>Bulan</td>
                <td>Jatuh Tempo</td>
                <td>No. Bayar</td>
                <td>Tgl. Bayar</td>
                <td>Jumlah</td>
                <td>Status</td>
                <td>Bayar</td>
            </tr>
        </thead>

        <?php
        $sql = mysqli_query($connect, "SELECT * FROM spp WHERE idsiswa = '$dataSiswa[idsiswa]' ORDER BY jatuhtempo ASC");
        $num = 1;
        while($data = mysqli_fetch_array($sql)){
            echo "<tr>
                <td>$num</td>
                <td>$data[bulan]</td>
                <td>$data[jatuhtempo]</td>
                <td>$data[nobayar]</td>
                <td>$data[tglbayar]</td>
                <td>$data[jumlah]</td>
                <td>$data[ket]</td>
                <td align='center'>";
                    if($data['nobayar'] == ''){
                        echo "<a class='btn btn-success' href='process_transaksi.php?nis=$nis&act=bayar&id=$data[idspp]'>Bayar</a>";
                    } else {
                        echo "-";
                    }
                echo "</td>
            </tr>";
            $num++;
        }
        ?>
    </table>

    <?php
    }
    ?>

    <p>Pembayaran SPP dilakukan dengan cara mencari tagihan siswa dengan NIS melalui form di atas.</p>
<?php include "footer.php";?>
