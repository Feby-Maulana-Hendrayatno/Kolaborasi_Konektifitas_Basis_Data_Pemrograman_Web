<?php

include '../../../config/config.php';

$request = 3;

if(isset($_GET['request'])){
	$request = $_GET['request'];
}

if($request == 1){

	$sql = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori";
	$employeeData = mysqli_query($koneksi,$sql);

	$response = array();
	
	$no = 1;
	while($row = mysqli_fetch_assoc($employeeData)){
		$response[] = array(
			"nomer" => $no++,
            "id" => $row['id'],
			"nama_kategori" => $row['nama_kategori'],
			"harga" => $row['harga'],
            "deskripsi" => $row['deskripsi'],
			"foto" => $row['foto']
			);
	}

	echo json_encode($response);
	exit;
}

if($request == 2){

    $id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];
	$deskripsi =$_POST['deskripsi'];

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;

    move_uploaded_file($tmpname, '../../image/' . $namafilebaru);

    $response = 0;

    $query = $koneksi->query("INSERT INTO produk VALUES ('','$id_kategori', '$harga', '$deskripsi', '$namafilebaru') ");

    if ($query != 0) {
        $response = 1;
    }

    echo $response;
    exit;

}


if ($request == 3) {

	$id = $_GET['id'];

	$data_sql = $koneksi->query("SELECT * FROM produk WHERE id = $id ");
	$sql_data = $data_sql->fetch_assoc();
	$fotoHapus = $sql_data['foto'];

	if (file_exists("../../image/".$fotoHapus)) {
		unlink("../../image/".$fotoHapus);
	}

	$sql = $koneksi->query("DELETE FROM produk WHERE id = $id");

	if($sql){
		echo 1; 
	}else{
		echo 0;
	}

	exit;
}

if ($request == 4) {

	$id = $_GET["id"];
	$sql = $koneksi->query("SELECT * FROM produk WHERE id = $id");

	$data = array();

	while ($ambil = $sql->fetch_assoc()) {
	    $data[] = array(
            'id' => $ambil['id'],
	        'id_kategori' => $ambil['id_kategori'],
            'harga' => $ambil['harga'],
            'deskripsi' => $ambil['deskripsi'],
			'foto' => $ambil['foto']
	    );
	}

	echo json_encode($data);
	exit;
}

if ($request == 5) {
	$id_produk = $_POST['id_produk'];
	$id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $gambar_lama = $_POST['gambar_lama'];
    
    $sql = $koneksi->query("SELECT * FROM produk WHERE id = $id_produk ");
    $data = $sql->fetch_assoc();
    $fotogambar = $data['foto'];

    
    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambar_lama;
    } else {
        if ($fotogambar != NULL) {
            if (file_exists("../../image/".$gambar_lama)) {
                unlink("../../image/".$gambar_lama);
            }
        }
        
        $namafile = $_FILES['foto']['name'];
        $ukuranfile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpname = $_FILES['foto']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namafile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensiGambar;
        
    }
    
    if (!empty($tmpname)) {
        move_uploaded_file($tmpname, "../../image/".$namafilebaru);

        $response = 0;

        $query = $koneksi->query("UPDATE produk SET id_kategori = $id_kategori, harga = $harga, deskripsi = '$deskripsi', foto = '$namafilebaru' WHERE id = '$id_produk' ");
    } else {
        $response = 0;

        $query = $koneksi->query("UPDATE produk SET id_kategori = $id_kategori, harga = $harga, deskripsi = $deskripsi WHERE id = '$id_produk' ");
    }

    if ($query != 0) {
        $response = 1;
    }

    echo $response;

    exit;
}
