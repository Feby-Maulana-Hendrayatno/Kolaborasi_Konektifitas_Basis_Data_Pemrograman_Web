<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
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

    <!-- Bagian Pencarian Makanan -->
    <section class="food-search text-center">
        <div class="container">
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>

    <!-- Bagian Menu Makanan -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu</h2>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/sate puyuh.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Sate Telur Puyuh</h4>
                    <p class="food-price">Rp.2000</p>
                    <p class="food-detail">
                        Telur yang dikukus terlebih dahulu kemudian dibumbui lalu dipanggang.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/sate usus.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Sate Usus</h4>
                    <p class="food-price">Rp.2000</p>
                    <p class="food-detail">
                        Sate usus yang dibumbui lalu dipanggan hingga matang dan tentunya keyal.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/sate tempe.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Sate Tempe</h4>
                    <p class="food-price">Rp.2000</p>
                    <p class="food-detail">
                        Makanan Lokal yg berbahan dasar ragi dan sangat disenangi pelanggan.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/sate kulit.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Sate Kulit Ayam</h4>
                    <p class="food-price">Rp.2000</p>
                    <p class="food-detail">
                        Kulit ayam yang crispy kemudian dipanggang dan dibumbui.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/ati.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Sate Ati Ampela</h4>
                    <p class="food-price">Rp.2000</p>
                    <p class="food-detail">
                        Ati dan ampela yang jadi kesukan beberapa orang dan sangan nikmat.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/gorengan.jpg" alt="Gorengan" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Gorengan</h4>
                    <p class="food-price">Rp.1000</p>
                    <p class="food-detail">
                        Gorengan yang murah meriah tapi rasanya sangat nikmat.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/sosis serba 2k.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Sosis Serba 2000</h4>
                    <p class="food-price">Rp.2000</p>
                    <p class="food-detail">
                        Aneka sosis yang beragam dan murah untuk kantong kita.
                    </p>
                    <br>
                    <a href="#" class="btn btn-primary">Pesan sekarang</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>

    <!-- Bagian Sosial Media -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Bagian Footer -->
    <section class="footer">
        <div class="container text-center">
            <p>Design by Feby & Astria for Web Programing</p>
        </div>
    </section>
</body>
</html>