<?php
    session_start();

    if(!isset($_SESSION['login'])) {
        echo "<script>alert('Login dahulu');</script>";
        echo "<script>window.location.replace('login.php');</script>";
    }
    $con = new mysqli("localhost", "root", "", "login"); 
?>

Selamat Datang <?php echo $_SESSION['username']; ?> <a href="logout.php">logout</a>