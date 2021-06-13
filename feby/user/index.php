<?php
    session_start();

    if(!isset($_SESSION['login_pengguna'])) {
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
    $con = new mysqli("localhost", "root", "", "angkringan-family"); 
?>

Selamat Datang <?php echo $_SESSION['username']; ?> <a href="logout.php">logout</a>
