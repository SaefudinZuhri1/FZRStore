<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bsimpan'])) {

    // Simpan Data Baru
    $id_admin = isset($_POST['id_admin']) ? $_POST['id_admin'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $plain_password = isset($_POST['password']) ? $_POST['password'] : '';
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
    $no_tlpn = isset($_POST['no_tlpn']) ? $_POST['no_tlpn'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';

    $simpan = mysqli_query($koneksi, "INSERT INTO tb_admin (id_admin, nama, username, password, no_tlpn, email, alamat) VALUES('$id_admin', '$nama', '$username', '$hashed_password', '$no_tlpn', '$email', '$alamat')");

    var_dump($simpan);

    // Mengonversi Menjadi Huruf Kecil
    $nama_admin = strtolower($_POST['nama']);
    $user = strtolower($_POST['username']);
    $email = strtolower($_POST['email']);
    $alamat = strtolower($_POST['alamat']);

    // Jika Simpan Data Sukses
    if ($simpan) {
        echo "<script>
        alert('Data Berhasil Ditambahkan!');
        window.location = 'daftar_admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambahkan!');
        window.location = 'daftar_admin.php';
        </script>";
    }
}
?>
