<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_db = "hanwul";

$koneksi = mysqli_connect("localhost","root","","hanwul");

if ( !$koneksi ) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>