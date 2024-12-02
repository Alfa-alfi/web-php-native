<?php
session_start(); //mulai sesi
//menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");

//mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {
    /*mengambil nilai dari form input dan menyimpannya ke dalam variabel*/
    $judul_lagu = $_POST['judul_lagu'];
    $artis = $_POST['artis'];
    $durasi = $_POST['durasi'];

    /*menyusun query SQL untuk menambahkan data ke tabel 'lagu' */
    $sql = "INSERT INTO lagu (judul_lagu, artis, durasi) VALUES ('$judul_lagu','$artis','$durasi')";

    //menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    //simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Lagu berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Lagu gagal ditambahkan!";
    }
    header('Location: index.php');
} else {
    //jika akses langsung tanpa form, tampilkan pesan error
    die ("Akses ditolak...");
}
?>