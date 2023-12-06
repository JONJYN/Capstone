<?php include "header.php"; ?>

<div class="col-lg-10 mx-auto p-4 py-md-5">
    <header class="d-flex align-items-center pb-3 mb-3 border-bottom">
        <h1 class="text-body-emphasis">Data Siswa</h1>
        <a href="add_siswa.php" class=" btn btn-primary d-flex text-body-emphasis">
            <span class="fs-6">Tambah Data</span>
        </a>
    </header>
    <main>
        <div class="d-flex flex-column justify-content-center py-3 mb-4 container-fluid">
            <div class="mb-5">
                <table class="table text-center align-middle table-bordered">
                    <thead class="table align-middle">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = mysqli_query($connect, "SELECT * FROM siswa ORDER BY kelas ASC");
                    $num = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<tr>
                            <td width='60px'>$num</td>
                            <td>$data[nis]</td>
                            <td class='text-start' width='300px'>$data[namasiswa]</td>
                            <td>$data[kelas]</td>
                            <td>$data[tahunajaran]</td>
                            <td>$data[biaya]</td>
                            <td width='150px'>
                                <a class='btn btn-warning btn-sm' href='edit_siswa.php?id=$data[idsiswa]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='clear_siswa.php?id=$data[idsiswa]'>Hapus</a>
                            </td>
                        </tr>";
                        $num++;
                    }
                    ?>
                </table>
                <p>N.P. Menghapus seorang siswa akan otomatis menghilangkan tagihan spp dari sistem</p>
            </div>
        </div>
    </main>
</div>

<?php include "footer.php"; ?>