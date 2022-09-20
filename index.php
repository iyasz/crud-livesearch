<?php

$conn = mysqli_connect('localhost', 'root', '', 'crud');

$select = $conn->query("SELECT * FROM siswa");

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nis = htmlspecialchars($_POST['nis']);
    $telepon = htmlspecialchars($_POST['telepon']);
    $sekolah = htmlspecialchars($_POST['sekolah']);
    $alamat = htmlspecialchars($_POST['alamat']);

    if (empty($nama) or empty($nis) or empty($telepon) or empty($sekolah) or empty($alamat)) {
        echo "<script>alert('Masukan Data dengan Lengkap!');
                      location.replace('index.php')</script>";
    } else {
        $simpan = $conn->query("INSERT INTO siswa VALUES(NULL, '$nama', '$nis', '$telepon', '$sekolah', '$alamat')");
        echo "<script>alert('Data Berhasil Di Simpan!');
                      location.replace('index.php')</script>";
    }
}

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_POST['id']);

    $delete = $conn->query("DELETE FROM siswa where id = '$id'");
    echo "<script>alert('Data Berhasil Di Hapus!');
                      location.replace('index.php')</script>";
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD TEMPLATE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <style>
        .container {
            top: 50px;
        }
    </style>
    <div class="container position-relative ">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="header mb-3">
                            <div class="h1">Form Input Data</div>
                        </div>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" autocomplete="off" placeholder="Masukan Nama Lengkap" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="nis">NIS</label>
                                <input type="number" placeholder="Masukan NIS" autocomplete="off" name="nis" id="nis" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="telepon">No Telp</label>
                                <input type="text" autocomplete="off" placeholder="Masukan No Telepon" name="telepon" id="telepon" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="sekolah">Asal Sekolah</label>
                                <input type="text" placeholder="Masukan Asal Sekolah" autocomplete="off" name="sekolah" id="sekolah" class="form-control">
                            </div>
                            <div class="mb-5">
                                <label for="alamat">Alamat</label>
                                <input type="text" autocomplete="off" placeholder="Masukan Alamat" name="alamat" id="alamat" class="form-control">
                            </div>

                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            <button class="btn btn-danger" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="" method="post" class="d-flex gap-2 mb-4">
                                    <input type="text" name="keyword" id="keyword" class="form-control" autocomplete="off" placeholder="Cari Disini ..">
                                    <button type="submit" class="btn btn-primary btn-sm" name="cari" id="tombol-cari">Search</button>
                                </form>
                            </div>
                        </div>
                        <div id="container">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>