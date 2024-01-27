<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bhapus'])) {

    $id_admin = $_POST['id_admin'];

    $hapus = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id_admin = '$_POST[id_admin]'"); 

    // Jika Simpan Data Sukses
    if ($hapus) {
        echo "<script>
        alert('Admin Berhasil Dihapus!');
        window.location = 'daftar_admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Admin Gagal Dihapus!');
        window.location = 'daftar_admin.php';
        </script>";
    }
}
?>
