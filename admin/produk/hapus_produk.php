<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bhapus'])) {

    // Simpan Data Baru
    $hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$_POST[id_produk]' ");

    // Jika Simpan Data Sukses
    if ($hapus) {
        echo "<script>
        alert('Data Berhasil Dihapus!');
        window.location = 'produk.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus!');
        window.location = 'produk.php';
        </script>";
    }
}
?>