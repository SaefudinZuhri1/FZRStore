<?php
session_start();

include '../../koneksi/koneksi.php';

// Tombol Simpan ditekan
if (isset($_POST['bsimpan'])) {

    $id_kategori = $_POST['nama_kategori'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga_produk'];
    $deskripsi = $_POST['desk_produk'];
    $stok = $_POST['stok_produk'];

    $nama_foto = $_FILES['foto']['name'];
    $lokasi_foto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($lokasi_foto[0], "../../images/" . $nama_foto[0]);

    $koneksi->query("INSERT INTO produk (id_produk, id_kategori, nama_produk, gambar_produk, harga_produk, desk_produk, stok_produk) VALUES (NULL ,'$id_kategori', '$nama', '$nama_foto[0]', '$harga', '$deskripsi', '$stok')");

    $id_baru = $koneksi->insert_id;

    foreach ($nama_foto as $key => $tiap_nama) {
        $tiap_lokasi = $lokasi_foto[$key];
        move_uploaded_file($tiap_lokasi, "../../images/foto-produk" . $tiap_nama);

        $koneksi->query("INSERT INTO produk_foto(id_produk, nama_produk_foto) VALUES('$id_baru', '$tiap_nama')");
    }

    if (isset($_FILES['foto'])) {
        echo "<script>
            alert('Foto Produk Berhasil Ditambahkan!');
            window.location = 'produk.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal Menambahkan Foto Produk!');
            window.location = 'produk.php';
        </script>";
    }
    // if (isset($_FILES['foto'])) {
    //   echo "<pre>";
    //    print_r($_FILES['foto']);
    //    echo "</pre>";
    // } else {
    //     echo "Tidak ada file yang diunggah.";
    // }
}
?>
