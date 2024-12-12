<!DOCTYPE html>
<html>
<head>
    <title>MUSIC STREAMING</title>
</head>
<body>
    <h3>Tambah Lagu</h3>
    <form action="proses-tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Judul Lagu</td>
                <td><input type"text" name="judul_lagu" required></td>
            </tr>
            <tr>
                <td>Artis</td>
                <td><input type="text" name="artis" required></td>
            </tr>
            <tr>
            <td>Durasi</td>
            <td><input type"text" name="durasi"></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>