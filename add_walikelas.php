<?php include "header.php"; ?>
<div class="container">
    <div class="page-header">
        <h3>Tambah Data Kelas & Wali Kelas</h3>
    </div>
    <form method="post" action="">
        <table class="table align-middle">
            <tr>
                <td>Pilih Guru / Wali Kelas</td>
                <td>
                    <select name="guru" class="form-control">
                        <option value="" selected>- Pilih Guru -</option>
                        <?php
                        ob_start();
                        $sqlGuru = mysqli_query($connect, "SELECT *FROM guru ORDER BY idguru ASC");
                        while ($dataGuru = mysqli_fetch_array($sqlGuru)) {
                            echo "<option value='$dataGuru[idguru]'>$dataGuru[namaguru]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input class="form-control" type="text" name="kelas" maxlength="40" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="Simpan" /></td>
            </tr>
        </table>
    </form>
</div>
<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Variable send from form
    $guru = $_POST['guru'];
    $kelas = $_POST['kelas'];

    if ($guru == '' || $kelas == '') {
        echo "Form Tidak Lengkap";
    } else {
        //Query insert data
        $query = mysqli_query($connect, "INSERT INTO walikelas(idguru, kelas) 
                            VALUES ('$guru', '$kelas')");

        if (!$query) {
            echo "Gagal Menambah Data";
        } else {
            header('location:show_walikelas.php');
        }
    }
}
?>

<?php include "footer.php"; ?>