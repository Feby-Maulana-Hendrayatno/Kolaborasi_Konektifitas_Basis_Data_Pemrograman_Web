<?php
    session_start();
    $id = $_GET['id'];
    unset($_SESSION['keranjang'][$id]);

    echo "<script>alert('Produk Terhapus');</script>";
    echo "<script>window.location.replace('keranjang.php');</script>";
?>