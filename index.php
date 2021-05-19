<?php include "koneksi.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/user.png">
				<h4>Angkringan</h4>
			</div>
			<ul>
				<li>
					<a href="home.php">
						<i class="las la-igloo" aria-hidden="true"></i>
						<span>Home</span>
					</a>
					
				</li>
				<li>
					<a href="pembelian.php">
						<i class="las la-receipt" aria-hidden="true"></i>
						<span>pembelian</span>
					</a>
				</li>
				<li>
					<a href="produk.php">
						<i class="las la-clipboard-list" aria-hidden="true"></i>
						<span>Produk</span>
					</a>
				</li>
				<li>
					<a href="pembayaran.php">
						<i class="las la-clipboard-list" aria-hidden="true"></i>
						<span>Pembayaran</span>
					</a>
				</li>
			</ul>
		</nav>
		<div id="page-inner"> 	
			<?php
			if (isset($_GET['halaman'])) {
				if ($_GET['halaman']=="pembelian") {
					include 'pembelian.php';
				}
				elseif ($_GET['halaman']=="produk"){
					include 'produk.php';
				}
				elseif ($_GET['halaman']=="pembayaran"){
					include 'pembayaran.php';
				}
				elseif ($_GET['halaman']=="hapusproduk"){
					include 'hapus.php';
				}
			}else{
				include 'home.php';
			}
			?>
		</div>
	</div>
</body>
</html>