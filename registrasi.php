<?php
require 'function.php';
if( isset($_POST["register"])){
    if(Registrasi($_POST)>0){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label  { 
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form id="registerForm" action="" method="post" onsubmit="encryptPassword()">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
            <label for="Password">password :</label>
            <input type="Password" name="Password" id="Password">
            </li>
            <li>
            <label for="Konfirmasi">konfirmasi :</label>
            <input type="Password" name="Konfirmasi" id="Konfirmasi">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>


</body>
</html>