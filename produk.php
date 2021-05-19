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
        .ubah{
            background-color: #FD3200;
            border-radius:5px;
        }
        .ubah a{
            color:white;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <form>
        <h2 class="data-produk">Data Produk</h2>
        <div class="table">
            <table class="section-1">
                <tr class="menu">
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Jumlah Makanan & Minuman</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
                    <?php
                    $nomor=1;
                    $sql = $pdo->prepare("SELECT * FROM tabel");
                    $sql->execute();
                    $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($sql->fetchAll() as $pecah){?>
                        <tr>	
                            <th><?php echo $nomor ?></th>
                            <th><?php echo $pecah['nama_pelanggan']; ?></th>
                            <th><?php echo $pecah['tanggal_pembelian']; ?></th>
                            <th><?php echo $pecah['jumlah_makanan&minuman']; ?></th>
                            <th><?php echo $pecah['total_harga']; ?></th>
                            <th>
                                <button class="hapus">
                                    <a href="hapus.php" class="btn-primary btn">hapus</a>
                                </button>
                            </th>
                        </tr>
                        <?php $nomor++;?>
                    <?php } ?>
            </table>
        </div>
    </form>
</body>
</html>