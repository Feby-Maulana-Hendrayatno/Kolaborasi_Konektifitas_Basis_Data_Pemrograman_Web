<?php
session_start();
include '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkringan Familly</title>
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
    <div class="gambar">
            <?php
        $sql = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori");
        $rows = $sql->num_rows;
        if ($rows > 0) {
            while ($data = mysqli_fetch_assoc($sql)) { ?>
                <div class="foto">
                    <img src="../admin/image/<?php echo $data['foto'] ?>" style="height:300px;">
                    <p style="font-size:30px; font-weight: bold;"> <?php echo $data['nama_kategori']; ?></p>
                    <p style="font-size:24px; font-family: sans-serif,serif; color:black;" ><?php echo $data['deskripsi']; ?></p>
                    <p style="font-size:25px; color:gray; " >Harga <?php echo $data['harga']; ?></p>
                    <a href=beli.php>Beli</a>
                </div>
                <?php
            }
        }
        ?>
        </div>
        </div>
    </div>
    </div>
        </body>

        </html>