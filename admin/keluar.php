<?php

if (!isset($_SESSION)) {
    session_start();
}

// Hapus Data Session
$_SESSION['username'] = null;

// Hancurkan Session
session_destroy();

// Kembali ke Login
echo "<script>
alert('Anda telah logout');
window.location = '../index.php';
</script>";

?>