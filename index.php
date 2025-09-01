<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome (untuk ikon) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>Data DIRI</title>
</head>
<body class="container mt-5">

  <h1 class="mb-4">Data Diri</h1>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>No Hape</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include "koneksi.php";
      $sqlt = mysqli_query($koneksi, "SELECT * FROM data_diri");
      $no = 1;

      while($data = mysqli_fetch_array($sqlt)) {
      ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama']; ?></td>
          <td><?= $data['alamat']; ?></td>
          <td><?= $data['jk']; ?></td>
          <td><?= $data['nope']; ?></td>
          <td>
            <!-- Tombol Edit -->
            <a href="edit.php?id_data=<?= $data['id_data'] ?>" class="btn btn-warning btn-sm">
              <i class="fas fa-edit"></i> Edit
            </a>

            <!-- Tombol Hapus -->
            <a href="hapus.php?id=<?= $data['id_data']; ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin ingin menghapus data ini?')">
              <i class="fas fa-trash-alt"></i> Hapus
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <a href="tambah.php" class="btn btn-success mb-3">
    <i class="fas fa-plus"></i> Tambah
  </a>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>