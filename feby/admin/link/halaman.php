<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php
    switch ($page) {
        case 'dashboard':
            include 'page/dashboard.php';
            break;

        case 'kategori' :
            include 'page/kategori/data_kategori.php';
            break;

        case 'produk':
            include 'page/produk/data_produk.php';
            break;

        case 'user':
        include 'page/user.php';
        break;

        case 'login':
            include 'page/login.php';
            break;

        case 'register':
            include 'page/register.php';
            break;

        case 'logout':
            include 'page/logout.php';
            break;

        default:
            echo "404 Not Found";
            break;
    }
?>