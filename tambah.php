<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php';
//cek apakah tombol submit sudah ditekan atau belom
if( isset($_POST["submit"]) ) {

    //cek data apkh berhasil d input
    if(tambah($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "<script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
    }
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">NIM :</label>
                <input type="text" name="nim" id="nim"
                required>
            </li>
            <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama"
            required>
            </li>
            <li>
            <label for="prodi">Kode_Prodi :</label>
            <input type="text" name="prodi" id="prodi"
            required>
            </li>
            <li>
            <label for="status">Status_Aktivitas :</label>
            <input type="text" name="status" id="status"
            required>
            </li>
            <button type="submit" name="submit">Tambah Data</button>
        </ul>
    </form>
</body>
</html>