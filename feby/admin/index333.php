<?php
	include "../config/config.php"; 
?>

<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('../login.php');</script>";
    }
    $con = new mysqli("localhost", "root", "", "login"); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/tabel.css">
    <link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
		<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Admin <b>Side</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
	</header>	
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="image/user.png">
				<h4>Angkringan</h4>
			</div>
			<ul>
				<li>
					<a href="home.php">
					<i class="fas fa-home"></i>
						<span>Home</span>
					</a>
				</li>
                <li>
                    <a href="?page=kategori">
                        <i class="las la-clipboard-list"></i>
                        <span> Kategori </span>
                    </a>
                </li>
                <li>
                    <a href="?page=produk">
                        <i class="las la-receipt"></i>
                        <span>Produk</span>
                    </a>
                </li>
				<li>
					<a href="?page=user">
						<i class="fa fa-user" aria-hidden="true"></i>
						<span>user</span>
					</a>
				</li>
				<li>
					<a href="login/logout.php">
						<i class="la la-sign-out" aria-hidden="true"></i>
						<span>Log Out</span>
					</a>
				</li>
			</ul>
		</nav>
		<div id="page-inner">
            <?php require 'link/halaman.php'; ?>
		</div>
    </div>
</body>
</html>