<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "web_school");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $row =[];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;   
    } 
    return $rows;
}

function tambah($data) {
    global $conn;
    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $status = htmlspecialchars($data["status"]);

        // query insert data
    $query = "INSERT INTO mahasiswa values 
        ('', '$nim', '$nama', '$prodi', '$status' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $status = htmlspecialchars($data["status"]);

        // query insert data
    $query = "UPDATE mahasiswa SET 
                nim = '$nim', nama = '$nama', kode_prodi = '$prodi', status_aktivitas = '$status'
                    WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($Keyword) {
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$Keyword%' OR 
    nim LIKE '%$Keyword%' OR
    kode_prodi LIKE '%$Keyword%' OR
    status_aktivitas LIKE '%$Keyword%'";
    return query($query);
}
function registrasi ($data) {
    global $conn;
    $Username = strtolower(stripslashes($data["username"]));
    $Password = mysqli_real_escape_string($conn, $data["Password"]);
    $Konfirmasi = mysqli_real_escape_string($conn, $data["Konfirmasi"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$Username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!')
            </script>";
        return false;
    }
    
    // cek konfirmasi password
    if ($Password !== $Konfirmasi) {
        echo"<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    //enkripsi password
    $Password = password_hash($Password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user Values('', '$Username', '$Password')");

    return mysqli_affected_rows($conn);
}


?>