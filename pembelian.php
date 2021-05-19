<?php include "koneksi.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .data-produk{
            margin:10px;
        }
        .table{
            margin:10px;
        }
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
        .menu  {
            background-color: #4CAF50;
            color: white;
        }
        .hapus{
            background-color: #FD3200;
            border-radius:5px;
        }
        .hapus a{
            color:white;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h2 class="data-produk">Data Produk</h2>
    <div class="table">
        <table class="section-1">
            <tr class="menu">
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Harga Makanan</th>
                <th>Nama Minuman</th>
                <th>Harga Minuman</th>
                <th>Aksi</th>
            </tr>
				<?php $nomor=1;  ?>
                <?php $ambil=$mysqli_ambil->query("SELECT * FROM tabel");?>
                <?php while($pecah=$ambil->fetch_assoc()){?>
                    <tr>	
                        <th><?php echo $nomor ?></th>
						<th><?php echo $pecah['nama_makanan']; ?></th>
                        <th><?php echo $pecah['harga_makanan']; ?></th>
                        <th><?php echo $pecah['nama_minuman']; ?></th>
                        <th><?php echo $pecah['harga_minuman']; ?></th>
                        <th>
                            <button class="ubah">
                                <a href="" class="btn-warning btn">ubah</a>
                            </button>
                            <button class="hapus">
                                <a href="" class="btn-danger btn">hapus</a>
                            </button>
                        </th>
                    </tr>
					<?php $nomor++;?>
                    <?php } ?>
                    <form method="POST">
                        Nama Kategori : <input type="text" name="nama_kategori">
                        <input type="submit" name="btn-simpan" value="Tambah">
                    </form>

                    <?php
                        if (isset($_POST['btn-simpan'])) {
                            $nama_kategori = $_POST['nama_kategori'];

                            $sql = "INSERT INTO  VALUES ('', '$nama_kategori')";

                            if ($mysqli_object->query($sql) === TRUE) {
                                echo "<script>alert('Berhasil');</script>";
                                echo "<script>window.location.replace('?halaman=kategori');</script>";
                                exit;
                            } else {
                                echo "<script>alert('Gagal');</script>";
                                echo "<script>window.location.replace('?halaman=tambah-kategori');</script>";
                                exit;
                            }
                        }
                    ?>
        </table>
    </div>
    </form>
</body>
</html>