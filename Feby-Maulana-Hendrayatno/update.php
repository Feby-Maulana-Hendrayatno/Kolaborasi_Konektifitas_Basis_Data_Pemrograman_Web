<?php

include "koneksi.php";

$data = json_decode(file_get_contents("php://input"));

$id_pelanggan = $data->id_pelanggan;
$nama_makanan = $data->nama_makanan;
$harga_makanan = $data->harga_makanan;
$nama_minuman = $data->nama_minuman;
$harga_minuman = $data->harga_minuman;

$sql = $koneksi->query("UPDATE tabel2 SET nama_makanan = '$nama_makanan', harga_makanan = '$harga_makanan', nama_minuman = '$nama_minuman',  harga_minuman = '$harga_minuman' WHERE id_pelanggan = $id_pelanggan");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;