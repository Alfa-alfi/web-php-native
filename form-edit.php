<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Mengambil ID lagu dari parameter URL 
$id = $_GET['pengguna_id']; 

    // Mengambil data lagu dari database berdasarkan ID
    $query = $db->query("SELECT * FROM Pengguna WHERE pengguna_id = '$id'");
    $pengguna = $query->fetch_assoc();
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>EDIT DATA PENGGUNA</title>
</head>
<body>
    <h3>Edit Data Pengguna</h3>
    <form action="proses-edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="pengguna_id" value="<?php echo $pengguna['pengguna_id']; ?>">
        <table border="0">
            <tr>
                <td>username</td>
                <td>
                    <input type="text" name="username" 
                    value="<?php echo $pengguna['username']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>email</td>
                <td>
                    <input type="text" name="email" 
                    value="<?php echo $pengguna['email']; ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>