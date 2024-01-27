<?php
session_start();

// Simpan data keranjang belanja ke dalam variabel sesi yang berbeda
$_SESSION['keranjang_belanja_db'] = $_SESSION['keranjang_belanja'];

// Hapus Data Session
$_SESSION['username'] = null;

// Hancurkan Session
session_destroy();

echo "<script>
alert('Anda telah logout');
window.location = '../index.php';
</script>";
exit();
?>
