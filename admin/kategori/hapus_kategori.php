<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bhapus'])) {

    // Simpan Data Baru
    $hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$_POST[id_kategori]' ");

    // Jika Simpan Data Sukses
    if ($hapus) {
        echo "<script>
        alert('Data Berhasil Dihapus!');
        window.location = 'kategori.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus!');
        window.location = 'kategori.php';
        </script>";
    }
}
?>