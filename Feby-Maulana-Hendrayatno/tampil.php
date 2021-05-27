<?php

include "koneksi.php";

$sql = $koneksi->query("SELECT * FROM tabel2");

$data = array();

while ($ambil = $sql->fetch_assoc()) {
    $data[] = array(
        'id_pelanggan' => $ambil['id_pelanggan'],
        'nama_makanan' => $ambil['nama_makanan'],
        'harga_makanan' => $ambil['harga_makanan'],
        'nama_minuman' => $ambil['nama_minuman'],
        'harga_minuman' => $ambil['harga_minuman']
    );
}

echo json_encode($data);
exit;