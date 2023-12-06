<?php include "header.php"; ?>
<?php
ob_start();
$sqlEdit = mysqli_query($connect, "SELECT * FROM walikelas WHERE kelas = '$_GET[kls]'");
$e = mysqli_fetch_array($sqlEdit);
?>

<div class="container">
    <div class="page-header">
        <h3>Edit Data Kelas & Wali Kelas</h3>
    </div>
    <form method="post" action="">
        <input type="hidden" name="idguru" value="<?php echo $e['idguru']; ?>" />
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
                            if ($dataGuru['idguru'] == $e['idguru']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            echo "<option value='$dataGuru[idguru]' $selected>$dataGuru[namaguru]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input class="form-control" type="text" name="kelas" value="<?php echo $e['kelas']; ?>" maxlength="40" readonly /></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="Update" /></td>
            </tr>
        </table>
    </form>

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
            $edit = mysqli_query($connect, "UPDATE walikelas SET idguru = '$guru' WHERE kelas = '$kelas'");

            if (!$edit) {
                echo "Gagal Mengubah Data";
            } else {
                header('location:show_walikelas.php');
            }
        }
    }
    ?>
</div>
<?php include "footer.php"; ?>