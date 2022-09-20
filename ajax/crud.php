<?php

$conn = mysqli_connect('localhost', 'root', '', 'crud');

$keyword = $_GET['keyword'];
$select = $conn->query("SELECT * FROM siswa");



$query = "SELECT * FROM siswa WHERE
            nama LIKE '%$keyword%' OR
            nis LIKE '%$keyword%' OR
            telepon LIKE '%$keyword%' OR
            asal_sekolah LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%'
            ";
$siswa = $conn->query($query);
?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>NIS</th>
            <th>No Telp</th>
            <th>Asal Sekolah</th>
            <th>Alamat</th>
            <th class="text- name=" keyword" class="form-control" autocomplete="off" center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($select as $selects) {  ?>
            <tr>
                <td> <?= $no++; ?> </td>
                <td> <?= $selects['nama']; ?> </td>
                <td> <?= $selects['nis']; ?> </td>
                <td> <?= $selects['telepon']; ?> </td>
                <td> <?= $selects['asal_sekolah']; ?> </td>
                <td> <?= $selects['alamat']; ?> </td>
                <td class="justify-content-center gap-1 d-flex">
                    <a class="btn btn-primary btn-sm" href="edit.php?id=<?= $selects['id'] ?>">Edit</a>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $selects['id'] ?>">
                        <button class="btn btn-danger btn-sm" name="delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>