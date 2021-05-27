<?php

include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$nama_makanan = $data->nama_makanan;
$harga_makanan = $data->harga_makanan;
$nama_minuman = $data->nama_minuman;
$harga_minuman = $data->harga_minuman;

$sql = $koneksi->query("INSERT INTO tabel2 (nama_makanan, harga_makanan, nama_minuman, harga_minuman) VALUES ('$nama_makanan', '$harga_makanan', '$nama_minuman', '$harga_minuman')");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;