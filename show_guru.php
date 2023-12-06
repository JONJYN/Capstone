<?php include "header.php"; ?>

<div class="col-lg-10 mx-auto p-4 py-md-5">
    <header class="d-flex align-items-center pb-3 mb-3 border-bottom">
        <h1 class="text-body-emphasis">Data Guru</h1>
        <a href="add_guru.php" class=" btn btn-primary d-flex text-body-emphasis">
            <span class="fs-6">Tambah Data</span>
        </a>
    </header>
    <main>
        <div class="d-flex flex-column justify-content-center py-3 mb-4 container-fluid">
            <div class="mb-5">
                <table class="table align-middle table-bordered">
                    <thead class="table text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($connect, "SELECT * FROM guru ORDER BY idguru ASC");
                    $num = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<tr>
                                <td class='text-center' width='60px'>$num</td>
                                <td>$data[namaguru]</td>
                                <td class='text-center' width='150px'>
                                    <a class='btn btn-warning btn-sm' href='edit_guru.php?id=$data[idguru]'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='clear_guru.php?id=$data[idguru]'>Hapus</a>
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