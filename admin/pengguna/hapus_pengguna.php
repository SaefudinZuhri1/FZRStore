<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bhapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$_POST[id_user]'"); 

    // Jika Simpan Data Sukses
    if ($hapus) {
        echo "<script>
        alert('Pengguna Berhasil Dihapus!');
        window.location = 'pengguna.php' ;
        </script>";
    } else {
        echo "<script>
        alert('Pengguna Gagal Dihapus!');
        window.location = 'pengguna.php';
        </script>";
    }
}
?>
