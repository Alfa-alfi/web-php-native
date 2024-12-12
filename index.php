<?php
//menghubungkan file config dengan index
include("../koneksi.php");
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MUSIC STREAMING</title>
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
        </style>
    </head>
    <body>

        <ul class="navlist">
            <li><a href="index.php">Pengguna</a>
            </li>
            <li><a href="../lagu/index.php">Lagu</a></li>
        </ul>

        <h2>Data Pengguna</h2>
        <?php if (isset($_SESSION['notifikasi'])): ?>
            <p><?php echo $_SESSION['notifikasi']; ?></p>
            <?php unset($_SESSION['notifikasi']); ?>
        <?php endif; ?>    
    <table>
        <thead> 
            <tr align="center">
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th><a href="form-tambah.php">Tambah Pengguna</a></th>
             </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; //membuat penomoran data dari 1
            //membuat variable untuk menjalankan query SQL
            $query = $db->query("SELECT * FROM pengguna");
            //perulangan while akan terus berjalan (menampilkan data)selama kondisi $queery bernilai true (adanya data pada table pengguna)
            while ($pengguna = $query->fetch_assoc()){
                //fungsi fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pengguna['username'] ?></td>
                <td><?php echo $pengguna['email'] ?></td>
                <td align="center">
                    <!-- URL ke halaman edit data dengan menggunakan parameter id pada kolom table -->
                    <a href="form-edit.php?pengguna_id=<?php echo $pengguna['pengguna_id'] ?>">Edit</a>
                     <!-- URL untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confirmasi hapus data-->
                    <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                    href="hapus.php?pengguna_id=<?php echo $pengguna['pengguna_id'] ?>">Hapus</a>
                </td> 
             </tr>
             <?php
            } /*mengakhiri proses perulangan while yang dimulai pada baris 40 */
            ?>
        </tbody>
    </table>
    <!-- menghitung jumlah baris yang ada pada table (pengguna) -->
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>
