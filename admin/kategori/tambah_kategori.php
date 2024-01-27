<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bsimpan'])) {

    // Mengonversi nama_kategori menjadi huruf kecil
    $data = strtolower($_POST['nama_kategori']);

    // Simpan Data Baru
    $simpan = mysqli_query($koneksi, "INSERT INTO kategori SET nama_kategori = '$_POST[nama_kategori]';");

    // Jika Simpan Data Sukses
    if ($simpan) {
        echo "<script>
        alert('Data Berhasil Ditambahkan!');
        window.location = 'kategori.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambahkan!');
        window.location = 'kategori.php';
        </script>";
    }
}
?>