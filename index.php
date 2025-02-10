<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'function.php'; 
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");
//tombol cari ditekan
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["Keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
</head>
<body>
<a href="logout.php">logout</a>
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post">
    <input type="text" name="Keyword" size="50" autofocus
    placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="Submit" name="Cari">Cari!</button>
</form>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>NO.</th>
        <th>Aksi</th>
        <th>nim</th>
        <th>nama</th>
        <th>kode_prodi</th>
        <th>status_aktivitas</th>
    </tr>

    <?php $i=1;?>
    <?php foreach($mahasiswa as $row): ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
            <a href="hapus.php?id=<?= $row["id"]; ?>"
            onclick="return confirm('yakin?');">Hapus</a>
        </td>
        <td><?php echo $row["nim"]; ?></td>
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo $row["kode_prodi"]; ?></td>
        <td><?php echo $row["status_aktivitas"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>