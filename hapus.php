<?php
session_start(); 
include("../koneksi.php");

// Periksa apakah ada lagu_id yang di kirim melalui URL
if (isset($_GET['lagu_id'])) {
    // Ambil lagu_id dari URL
    $id = $_GET['lagu_id'];

    // Buat query untuk menghapus data siswa berdasarkan lagu_id
    $sql = "DELETE FROM lagu WHERE lagu_id=$id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi bedasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Lagu berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Lagu gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa lagu_id, tampilkan pesan error
    die("Akses ditolak...");
}
?>