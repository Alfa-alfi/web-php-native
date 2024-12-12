<?php
session_start(); //mulai sesi
//menghubungkan file ini dengan file konfigurasi database
include("../koneksi.php");

//mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {
    /*mengambil nilai dari form input dan menyimpannya ke dalam variabel*/
    $username = $_POST['username'];
    $email = $_POST['email'];

    /*menyusun query SQL untuk menambahkan data ke tabel 'pengguna' */
    $sql = "INSERT INTO Pengguna (username, email) VALUES ('$username','$email')";

    //menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    //simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Pengguna berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Pengguna gagal ditambahkan!";
    }
    header('Location: index.php');
} else {
    //jika akses langsung tanpa form, tampilkan pesan error
    die ("Akses ditolak...");
}
?>