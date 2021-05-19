<?php
    include "koneksi.php";

    $nama_pelanggan = $_GET['nama_pelanggan'];

    $sql = " DELETE FROM tabel WHERE nama_pelanggan = '$nama_pelanggan'";
    $pdo->exec($sql);
?>