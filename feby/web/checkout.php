<?php
    session_start();
    include '../config/config.php';

    if (!isset($_SESSION['pelanggan'])) {
        echo "<script>alert('Maaf, Anda Harus Login Terlebih Dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    } else if (!isset($_SESSION['keranjang'])) {
        echo "<script>alert('Tidak Ada Checkout');</script>";
        echo "<script>window.location.replace('categories.php');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkringan Familly</title>
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/tabel.css">
</head>
<body>
    <!-- Bagian Navbar -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo angkringan1.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
            <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Kategori</a>
                    </li>
                    <li>
                        <a href="foods.php">Menu</a>
                    </li>
                    <?php if ($_SESSION['login']) : ?>
                        Logout
                    <?php else : ?>
                        Login
                    <?php endif ?>
                    <li>
                        <a href="../login.php">Login |</a>
                        <a href="../logout.php" >| Logout <i class="la la-sign-out" aria-hidden="true"></i> </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Bagian Kategori -->
    <div class="food-menu-desc">
        <h3>Data Checkout </h3>
    <form method="POST">
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id => $jumlah) : ?>
                    <?php 
                        $query = $koneksi->query("SELECT * FROM produk WHERE id = $id");
                        $pecah = $query->fetch_assoc();
                        $subharga = $pecah['harga'] * $jumlah;    
                    ?>
                    <tr>
                        <td><?php echo ++$no; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td>
                            <a href="hapus_keranjang.php?id=<?php echo $pecah['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php $totalbelanja+=$subharga ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total Belanja</td>
                    <td>
                        <?php echo $totalbelanja ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        
        <br>
        <table border="1" cellpadding="10" cellspacing="0" width="100%" style="padding: 20px;">
            <tr>
                <td>Nama Pelanggan</td>
                <td><?php echo $_SESSION['nama_pelanggan']  ?></td>
            </tr>
        </table>
        <br>
        <button type="submit" name="print" style="padding: 10px; border-radius: 5px; background-color: green; color: white;">
            Checkout
        </button>
    </form>
        <?php
            if (isset($_POST['print'])) {
                $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                $nama_pelanggan = $_SESSION['pelanggan']['nama_pelanggan'];
                date_default_timezone_set("Asia/Jakarta");
                $tgl_beli = date("Y-m-d");
                
                $koneksi->query("INSERT INTO tb_checkout (id_checkout, id_pelanggan, nama_pelanggan, tgl_beli, total_beli, status) VALUES ('', '$id_pelanggan','$nama_pelanggan','$tgl_beli', '$totalbelanja', 0) ");
                $id_pembelian_baru = $koneksi->insert_id;

                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id = $id_produk ");
                    $perproduk = $ambil->fetch_assoc();
                    $id_produk = $perproduk['id'];
                    $harga = $perproduk['harga'];
                    $koneksi->query("INSERT INTO pembelian_barang (id_pembelian_barang, id_pembelian, id_produk, jumlah, harga) VALUES ('','$id_pembelian_baru', '$id_produk', '$jumlah', '$harga') ");
                };

                unset($_SESSION['keranjang']);

                echo "<script>alert('Terima Kasih');</script>";
                echo "<script>window.location.replace('categories.php');</script>";
            }
        ?>
        <br>
    </div>
    </body>
</html>