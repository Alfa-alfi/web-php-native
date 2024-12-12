<?php
session_start(); 
include("../koneksi.php");

// Periksa apakah ada ID yang di kirim melalui URL
if (isset($_GET['pengguna_id'])) {
    // Ambil ID dari URL
    $id = $_GET['pengguna_id'];

    // Buat query untuk menghapus data siswa berdasarkan ID
    $sql = "DELETE FROM pengguna WHERE pengguna_id=$id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi bedasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Pengguna berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Pengguna gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa ID, tampilkan pesan error
    die("Akses ditolak...");
}
?>