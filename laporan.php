<?php include "header.php";?>
    
<div class="container">
    <div class="page-header">
        <h3>Laporan</h3>
    </div>  
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item"><a class="btn btn-warning" href="laporan_data_guru.php" target="blank">Laporan Data Guru</a></li>
        <li class="list-group-item"><a class="btn btn-danger" href="laporan_data_siswa.php" target="blank">Laporan Data Siswa</a></li>
        <li class="list-group-item">
            <strong>Laporan Pembayaran</strong><br/>
            <form method="get" action="laporan_pembayaran.php" target="blank">
                Mulai tanggal <input class="form-control" type="date" name="tgl1"/>
                Sampai tanggal <input class="form-control" type="date" name="tgl2" value="<?php echo date('Y-m-d'); ?>"/>
                <input class="btn btn-success" type="submit" value="Tampilkan"/>
            </form>
        </li>
    </ul>
    
<?php include "footer.php";?>
