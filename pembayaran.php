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
    <h2 class="data-produk">Pembayaran</h2>
    <div class="table">
        <table class="section-1">
            <tr class="menu">
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Total Yang Dibayar</th>
                <th>Aksi</th>
            </tr>
				<?php $nomor=1;  ?>
                <?php $ambil = mysqli_query($mysqli_conn, "SELECT * FROM tabel");?>
                <?php while($pecah=$ambil->fetch_assoc()){?>
                    <tr>	
                        <th><?php echo $nomor ?></th>
						<th><?php echo $pecah['nama_pelanggan']; ?></th>
                        <th><?php echo $pecah['total_harga']; ?></th>
                        <th>
                            <button class="hapus">
                                <a href="hapus.php?nama_pelanggan=<?php echo $pecah['nama_pelanggan']; ?>" class="btn-danger btn">hapus</a>
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