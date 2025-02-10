<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php';

//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdsarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belom
if( isset($_POST["submit"]) ) {

    //cek data apkh berhasil d ubah
    if(ubah($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "<script>
                alert('data gagal diubah');
                document.location.href = 'index.php';
            </script>
            ";
    }
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nim">NIM :</label>
                <input type="text" name="nim" id="nim"
                required value="<?= $mhs["nim"]; ?>">
            </li>
            <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama"
            required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
            <label for="prodi">Kode_Prodi :</label>
            <input type="text" name="prodi" id="prodi"
            required value="<?= $mhs["kode_prodi"]; ?>">
            </li>
            <li>
            <label for="status">Status_Aktivitas :</label>
            <input type="text" name="status" id="status"
            required value="<?= $mhs["status_aktivitas"]; ?>">
            </li>
            <button type="submit" name="submit">Ubah Data</button>
        </ul>
    </form>
</body>
</html>