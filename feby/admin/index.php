    <?php
    session_start();
    include '../config/config.php';

    if (!isset($_SESSION['login'])) {
        echo "<script>window.location.href = '../login.php'</script>";
        return;
    }

    if ($_SESSION['role'] != 1) {
        echo "<scripwt>window.location.href = '../index.php'</script>";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="css/tabel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>

    <body>
        <input type="checkbox" id="check">
        <header>
            <label for="check">
                <i class="fas fa-bars" id="sidebar_btn"></i>
            </label> 
            <div class="left_area">
                <h3>Admin<span>Side</span></h3>
            </div>
        </header>
        <div class="sidebar">
            <center>
                <img src="image/angkringan.png" class="profile_admin">
                <h2>Angkringan</h2>
            </center>
            <a href="?page=home">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="?page=kategori">
                <i class="las la-clipboard-list"></i> 
                <span>Kategori</span>
            </a>
            <a href="?page=produk">
                <i class="las la-receipt"></i> 
                <span>Produk</span>
            </a>
                <a href="../logout.php">
                <i class="la la-sign-out"></i> 
                <span>Logout</span>
            </a>
        </div>
        <!-- Sidebar end -->

        <div class="content">
            <div class="isi">
                <div class="row">
                        <?php require 'link/halaman.php'; ?>
                </div>
            </div>
    </body>

    </html>