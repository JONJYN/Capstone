<?php include "header.php"; ?>

<div class="col-lg-10 mx-auto p-4 py-md-5">
    <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
        <h1 class="text-body-emphasis">Data Wali Kelas</h1>
        <a href="add_walikelas.php" class=" btn btn-primary d-flex text-body-emphasis">
            <span class="fs-6">Tambah Data</span>
        </a>
    </div>
    <main>
        <div class="d-flex flex-column justify-content-center py-3 mb-4 container-fluid">
            <div class="mb-5">
                <table class="table align-middle text-center table-bordered" border="1" width="auto">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Nama Wali Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($connect, "SELECT walikelas.kelas, walikelas.idguru, guru.namaguru
                        FROM walikelas INNER JOIN guru ON walikelas.idguru = guru.idguru
                        ORDER BY walikelas.kelas ASC");
                    $num = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<tr>
                            <td width='60px'>$num</td>
                            <td width='120px'>$data[kelas]</td>
                            <td class='text-start'>$data[namaguru]</td>
                            <td class='text-center' width='150px'>
                                <a class='btn btn-warning' href='edit_walikelas.php?kls=$data[kelas]'>Edit</a>
                                <a class='btn btn-danger' href='clear_walikelas.php?kls=$data[kelas]'>Hapus</a>
                            </td>
                        </tr>";
                        $num++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>
</div>
<?php include "footer.php"; ?>