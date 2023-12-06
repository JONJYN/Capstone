<?php include "header.php"; ?>
<?php
ob_start();
$sqlEdit = mysqli_query($connect, "SELECT * FROM siswa WHERE idsiswa = '$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>

<div class="container">
    <div class="page-header">
        <h3>Edit Data Siswa</h3>
    </div>
    <form method="post" action="">
        <input type="hidden" name="idsiswa" value="<?php echo $e['idsiswa']; ?>" />
        <table>
            <tr>
                <td>NIS</td>
                <td><input class="form-control" type="text" name="nis" maxlength="10" value="<?php echo $e['nis']; ?>" /></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><input class="form-control" type="text" name="namasiswa" maxlength="40" value="<?php echo $e['namasiswa']; ?>" /></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>
                    <select name="kelas" class="form-control" />
                    <option value="" selected>- Pilih Kelas -</option>
                    <?php
                    ob_start();
                    $queryKelas = mysqli_query($connect, "SELECT * FROM walikelas ORDER BY kelas ASC");
                    while ($k = mysqli_fetch_array($queryKelas)) {
                        if ($k['kelas'] == $e['kelas']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }
                    ?>
                        <option value="<?php echo $k['kelas']; ?>" <?php echo $selected; ?>><?php echo $k['kelas']; ?></option>
                    <?php

                    } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input class="form-control" type="text" name="tahunajaran" value="<?php echo $e['tahunajaran']; ?>" readonly /></td>
            </tr>
            <tr>
                <td>Biaya SPP</td>
                <td><input class="form-control" type="text" name="biaya" value="<?php echo $e['biaya']; ?>" readonly /></td>
            </tr>
            <tr>
                <td>Jatuh Tempo Pertama</td>
                <td><input class="form-control" type="text" name="jatuhtempo" value="2023-07-10" readonly /></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="Update" /></td>
            </tr>
        </table>
    </form>
</div>
<!--Process Query-->
<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Variable sent from form
    $id = $_POST['idsiswa'];
    $nis = $_POST['nis'];
    $nama = $_POST['namasiswa'];
    $kelas = $_POST['kelas'];
    $tahun = $_POST['tahunajaran'];
    $biaya = $_POST['biaya'];
    $awaltempo = $_POST['jatuhtempo'];

    if ($nis == '' || $nama == '' || $kelas == '') {
        echo "Form Tidak Lengkap";
    } else {
        //Query insert data
        $edit = mysqli_query($connect, "UPDATE siswa SET nis = '$nis', 
                            namasiswa = '$nama', kelas = '$kelas', 
                            tahunajaran = '$tahun', biaya = '$biaya' 
                            WHERE idsiswa = '$id'");

        if (!$edit) {
            echo "Gagal Mengubah Data";
        } else {
            header('location:show_siswa.php');
        }
    }
}
?>

<?php include "footer.php"; ?>