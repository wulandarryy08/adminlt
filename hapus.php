<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // amankan input agar hanya angka

    // query hapus
    $query = "DELETE FROM data_diri WHERE id_data = $id";
    if (mysqli_query($koneksi, $query)) {
        // jika berhasil hapus
        header("Location: index.php?status=deleted");
        exit();
    } else {
        // jika gagal hapus
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    // kalau tidak ada id
    header("Location: index.php");
    exit();
}
?>