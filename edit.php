<?php
include "koneksi.php";

$id = isset($_GET['id_data']) ? $_GET['id_data'] : null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$data = $koneksi->query("SELECT * FROM data_diri WHERE id_data=$id")->fetch_assoc();
if (!$data) {
    echo "Data tidak ditemukan";
    exit();
}

if (isset($_POST['simpan'])) {
    $nama   = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jk     = $koneksi->real_escape_string($_POST['jk']);
    $nope   = $koneksi->real_escape_string($_POST['nope']);

    $query = "UPDATE data_diri SET 
                nama='$nama', 
                alamat='$alamat', 
                jk='$jk', 
                nope='$nope' 
              WHERE id_data=$id";

    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal update data: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data Diri</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <input type="text" name="jk" value="<?= $data['jk'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nope" class="form-label">No Handphone</label>
            <input type="text" name="nope" value="<?= $data['nope'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>