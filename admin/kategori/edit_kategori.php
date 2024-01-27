<?php

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bubah'])) {

    // Mengonversi nama_kategori menjadi huruf kecil
    $data = strtolower($_POST['nama_kategori']);

    // Ubah Data 
    $ubah = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori = '$_POST[id_kategori]'");
    var_dump($ubah);

    // Jika Simpan Data Sukses
    if ($ubah) {
        echo "<script>
        alert('Data Berhasil Diubah!');
        window.location = 'kategori.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Diubah!');
        window.location = 'kategori.php';
        </script>";
    }
}

?>