<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama   = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jk     = $koneksi->real_escape_string($_POST['jk']);
    $nope   = $koneksi->real_escape_string($_POST['nope']);

    $query = "INSERT INTO data_diri (nama, alamat, jk, nope) 
              VALUES ('$nama', '$alamat', '$jk', '$nope')";

    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan data: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Data Diri</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <input type="text" name="jk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nope" class="form-label">No Handphone</label>
            <input type="number" name="nope" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>