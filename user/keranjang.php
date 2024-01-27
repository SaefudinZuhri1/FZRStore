<?php
session_start();

if (!isset($_SESSION["status_login_user"])) {
   header("Location: masuk_user.php");
   exit();
}


// Proses Simpan Produk

$id_produk = $_GET['idproduk'];

if (isset($_SESSION['keranjang_belanja'][$id_produk])) {
   $_SESSION['keranjang_belanja'][$id_produk]+=1;
} else {
   $_SESSION['keranjang_belanja'][$id_produk]=1;
}

echo "<script>alert('Produk Telah Ditambahkan Ke Dalam Keranjang');</script>";
echo "<script>window.location = 'detail_keranjang.php';</script>";

?>
