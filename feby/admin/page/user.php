<!-- <?php 
	session_start();

	if (!isset($_SESSION['login'])) {
		echo "<script>alert('Login Dahulu');</script>";
		echo "<script>window.location.replace('../login/login.php');</script>";
	}
	
	include "koneksi.php"; 
?> -->

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "login";

	$mysqli_ambil = new mysqli($servername, $username, $password, $database);

// procedural
$mysqli_conn = mysqli_connect($servername, $username, $password, $database);


// Check connection 
//object
if ($mysqli_ambil->connect_error) {
    die("Connection failed: " . $mysqli_conn->connect_error());
}

// procedural
if (!$mysqli_conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Akun</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
    <form>
        <h2 class="data-produk">Data Pembelian</h2>
        <div class="table">
            <table class="section-1">
                <tr class="menu">
				<th>No</th>
                    <th>Role User</th>
                    <th>Nama Pembeli</th>
                    <th>email</th>
                </tr>
                    <?php
                    $nomor=1;
                    $sql = $mysqli_ambil->query("SELECT * FROM tb_login");
                    foreach($sql as $pecah){?>
                        <tr>	
                            <th><?php echo $nomor ?></th>
                            <th><?php echo $pecah['role']; ?></th>
                            <th><?php echo $pecah['username']; ?></th>
                            <th><?php echo $pecah['email']; ?></th>
                        </tr>
                        <?php $nomor++;?>
                    <?php } ?>
            </table>
			<br>
			<table class="section-1">
                <tr class="menu">
                    <th>No</th>
                    <th>Role User</th>
                    <th>Nama Pembeli</th>
                    <th>email</th>
                </tr>
                    <?php
                    $nomor=1;
                    $sql = $mysqli_ambil->query("SELECT * FROM tb_login_pembeli");
                    foreach($sql as $pecah){?>
                        <tr>	
                            <th><?php echo $nomor ?></th>
                            <th><?php echo $pecah['role']; ?></th>
                            <th><?php echo $pecah['pembeli']; ?></th>
                            <th><?php echo $pecah['email']; ?></th>
                        </tr>
                        <?php $nomor++;?>
                    <?php } ?>
            </table>
        </div>
    </form>
	</div>
</body>
</html>