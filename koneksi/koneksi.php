<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'katalog';

$koneksi = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Proses Pendaftaran Mulai

function submit($data) {
    global $koneksi;

    $nama = strtolower(stripslashes($data['name']));
    $user = mysqli_real_escape_string($koneksi, $data['username']);
    $pass = mysqli_real_escape_string($koneksi, $data['password']);
    $token_pass = mysqli_real_escape_string($koneksi, $data['token_pass']);
    $tlpn = mysqli_real_escape_string($koneksi, $data['no_tlpn']);
    $email = mysqli_real_escape_string($koneksi, $data['email']);
    $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);

    // Cek Username
    $result = mysqli_query($koneksi, "SELECT * from user WHERE username = '$user'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username telah terdaftar. Silakan gunakan username lainnya');
        </script>";
        return false;
    } 
    
    // Enskripsi Password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // Menambahkan Data Baru ke Database
    $result = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$user', '$pass', '$token_pass', '$tlpn', '$email', '$alamat')");

    return mysqli_affected_rows($koneksi);

}

// Proses Pendaftaran Selesai

?>