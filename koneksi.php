<?php
// Menentukan nama host, biasanya "localhost"
$server = "localhost";
// Nama pengguna Mysql (default: root)
$user = "root";
// Kata sandi untuk pengguna Mysql (default: kosong untuk root)
$password = "";
// Nama basis data yang akan dihubungkan
$nama_database = "music_streaming";
// Mencoba untuk membuat koneksi ke basis data
$db = mysqli_connect($server, $user, $password, $nama_database);
// Memeriksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>