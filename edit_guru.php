<?php include "header.php"; ?>
<?php
$sqlEdit = mysqli_query($connect, "SELECT * FROM guru WHERE idguru='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
?>

<div class="container">
    <div class="page-header">
        <h3>Edit Data Guru</h3>
    </div>
        <form method="post" action="">
            <input type="hidden" name="idguru" value="<?php echo $e['idguru']; ?>" />
            <table class="table align-middle">
                <tr>
                    <td>Nama Guru</td>
                    <td><input class="form-control" type="text" name="namaguru" value="<?php echo $e['namaguru']; ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="btn btn-success" type="submit" value="Update" /></td>
                </tr>
            </table>
        </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Variable send from form
    $id = $_POST['idguru'];
    $nama = $_POST['namaguru'];

    if ($nama == '') {
        echo "Nama Guru Tidak Boleh Kosong";
    } else {
        //Query insert data
        $edit = mysqli_query($connect, "UPDATE guru SET namaguru = '$nama' WHERE idguru = '$id'");

        if (!$edit) {
            echo "Gagal Menambah Data";
        } else {
            header('location:show_guru.php');
        }
    }
}
?>

<?php include "footer.php"; ?>