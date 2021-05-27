<?php

include "koneksi.php";
$id_pelanggan = $_GET["id_pelanggan"];
$sql = $koneksi->query("DELETE FROM tabel2 WHERE id_pelanggan = '$id_pelanggan'");

if($sql){
    echo 1; 
}else{
    echo 0;
}

exit;