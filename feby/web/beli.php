<?php
session_start();

$id_kategori = $_GET['id'];

if(isset($_SESSION['keranjang'] [$id_kategori] )){
    $_SESSION['keranjang'] [$id_kategori]+=1;
}else{
    $_SESSION['keranjang'] [$id_kategori] =1;
}


echo "<script>alert('produk telah masuk ke keranjang');<script>";
echo"<script>location='keranjang.php';<script>";
?>