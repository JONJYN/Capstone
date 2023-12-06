<?php include "header.php";?>

<div class="container">
    <div class="page-header">
        <h3>Tambah Siswa</h3>
    </div>
    <form method="post" action="">
        <table class="table align-middle">
            <tr>
                <td>NIS</td>
                <td><input class="form-control" type="text" name="nis" maxlength="10" /></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><input class="form-control" type="text" name="namasiswa" maxlength="40" /></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select name="kelas" class="form-control" />
                        <option value="" selected>- Pilih Kelas -</option>
                        <?php
                        ob_start();
                        $queryKelas = mysqli_query($connect, "SELECT * FROM walikelas ORDER BY kelas ASC");
                        while($k = mysqli_fetch_array($queryKelas)){
                            ?>
                            <option value="<?php echo $k['kelas']; ?>"><?php echo $k['kelas']; ?></option>
                            <?php
                        }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input class="form-control" type="text" name="tahunajaran" value="2023/2024" readonly/></td>
            </tr>
            <tr>
                <td>Biaya SPP</td>
                <td><input class="form-control" type="text" name="biaya" value="250000" readonly/></td>
            </tr>
            <tr>
                <td>Jatuh Tempo Pertama</td>
                <td><input class="form-control" type="text" name="jatuhtempo" value="2023-07-10" readonly/></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="Simpan" /></td>
            </tr>
        </table>
    </form>
    
<?php
ob_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Variable sent from form
    $nis = $_POST['nis'];
    $nama = $_POST['namasiswa'];
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahunajaran'];
    $biaya = $_POST['biaya'];
    $awaltempo = $_POST['jatuhtempo'];

    //Creat array for months
    $bulanIndo = array(
        '01' => "Januari",
        '02' => "Februari",
        '03' => "Maret",
        '04' => "April",
        '05' => "Mei",
        '06' => "Juni",
        '07' => "Juli",
        '08' => "Agustus",
        '09' => "September",
        '10' => "Oktober",
        '11' => "November",
        '12' => "Desember"
    );

    if($nis == '' || $nama == '' || $kelas == ''){
        echo "Form tidak lengkap";
    } else{
        //Query insert data
        $query = mysqli_query($connect, "INSERT INTO siswa(nis, namasiswa, kelas, tahunajaran, biaya) 
                            VALUES ('$nis', '$nama', '$kelas', '$tahun', '$biaya')");

        if(!$query){
            echo "Gagal Menambah Siswa";
        } else{
            //Query insert jatuh tempo
            $ds = mysqli_fetch_array(mysqli_query($connect, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
            $idsiswa = $ds['idsiswa'];

            //Create bill (6 months starting July 2023 and save the bill in spp table)
            for($i = 0; $i < 12; $i++){
                //Date
                $jatuhtempo = date('Y-m-d', strtotime("+$i month", strtotime($awaltempo)));
                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]."".date('Y', strtotime($jatuhtempo));

                mysqli_query($connect, "INSERT INTO spp(idsiswa, jatuhtempo, bulan, jumlah) 
                            VALUES ('$idsiswa', '$jatuhtempo', '$bulan', '$biaya')");
            }
            //Redirect to home
            header('location:show_siswa.php');
        }
    }
}
?>

<?php include "footer.php";?>
