<?php 

// Function untuk URL
function url_dasar() {
    return 'ubah_password.php';
}

// Function Kirim Email
function kirim_email($email, $judul_email, $isi_email) {
}

// koneksi mengubah data barang
function update_barang($POST, $id_produk)
    {
        global $koneksi;
        
        $query = "UPDATE produk SET nama_kategori = '$id_kategori', nama_produk = '$nama', harga_produk = '$harga', desk_produk = '$desk', stok_produk = '$stok_produk' WHERE id_produk = $id_produk";

        $id_kategori = $_GET['nama_kategori'];
        $id_produk = $_GET['id_produk'];
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga_produk'];
        $desk = $_POST['desk_produk'];
        $stok_produk = $_POST['stok_produk'];
        update_barang($_POST, $id_produk);
        //Query Update

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);

}

?>