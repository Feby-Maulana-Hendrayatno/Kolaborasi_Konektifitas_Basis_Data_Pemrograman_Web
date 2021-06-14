<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php
    switch ($page) {
        case 'home':
            include 'page/home.php';
            break;

        case 'kategori' :
            include 'page/kategori/data_kategori.php';
            break;

        case 'produk':
            include 'page/produk/data_produk.php';
            break;

        default:
            echo "404 Not Found";
            break;
    }
?>