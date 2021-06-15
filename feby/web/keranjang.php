<?php
    session_start();
    include '../config/config.php';
    if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
        echo "<script>alert('Data Keranjang Tidak Ada');</script>";
        echo "<script>window.location.replace('categories.php');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkringan Familly</title>
    <link rel="stylesheet" href="css/tabel.css">
    <link rel="stylesheet" href="css/order.css">
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
                    <!-- <?php if ($_SESSION['login']) : ?>
                        Logout
                    <?php else : ?>
                        Login
                    <?php endif ?>
                    <li> -->
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
        <h3>Keranjang Belanja</h3> <a href="categories.php">Lanjutkan Belanja</a>
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
                    ?>
                    <tr>
                        <td><?php echo ++$no; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td>
                            <a href="hapus_keranjang.php?id=<?php echo $pecah['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
        <br>
        <a href="checkout.php" style="background-color: green; padding: 10px; color: white; border-radius: 5px;">
            Checkout
        </a>
    </div>
    </body>
</html>