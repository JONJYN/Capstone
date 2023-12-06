<?php include "header.php"; ?>
<div class="container">
    <div class="page-header">
        <h3>Tambah Data Guru</h3>
    </div>
    <form method="post" action="">
        <table class="table align-middle">
            <tr>
                <td>Nama Guru</td>
                <td><input class="form-control" type="text" name="namaguru" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-success" type="submit" value="Simpan" /></td>
            </tr>
        </table>
    </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Variable send from form
    $nama = $_POST['namaguru'];

    if ($nama == '') {
        echo "Nama Guru Tidak Boleh Kosong";
    } else {
        //Query insert data
        $query = mysqli_query($connect, "INSERT INTO guru(namaguru) VALUES ('$nama')");

        if (!$query) {
            echo "Gagal Menambah Data";
        } else {
            header('location:show_guru.php');
        }
    }
}
?>

<?php include "footer.php"; ?>