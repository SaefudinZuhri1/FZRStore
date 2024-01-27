<?php
session_start();

// Ambil id_produk dari parameter URL
$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : null;

if ($id_produk !== null) {
    // Hapus produk dari sesi keranjang belanja
    unset($_SESSION['keranjang_belanja'][$id_produk]);

    // Redirect ke halaman barang.php setelah penghapusan
    echo"<script>alert('Produk Berhasil Dihapus Dari Keranjang!');</script>";
    echo"<script>window.location = 'detail_keranjang.php';</script>";
    exit();
} else {
    // Tindakan penanganan kesalahan jika ID Produk tidak valid
    echo "<script>alert('ID Produk tidak valid');</script>";
    echo "<script>window.location = 'halaman_error.php';</script>";
    exit();
}
?>
