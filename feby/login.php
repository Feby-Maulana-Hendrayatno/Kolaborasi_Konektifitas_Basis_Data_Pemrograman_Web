<?php
    session_start();
    if (isset($_SESSION['login'])) {
        echo "<script>alert('Logout dahulu');</script>";
        echo "<script>window.location.replace('web/index.php');</script>";            
        
    }

    $con = new mysqli("localhost", "root", "", "angkringan-family"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style-login.css" media="screen" title="no title">
</head>
<body>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>
            <form method="POST" class="form">
                <label style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input class="form-content" type="text" name="username" />
                <div class="form-border"></div>
                <label style="padding-top:22px">&nbsp;Password
                </label>
                <input class="form-content" type="password" name="password"/>
                <div class="form-border"></div>
                <a href="#">
                    <legend id="forgot-pass">Forgot password?</legend>
                </a>
                <input id="submit-btn" type="submit" name="btn-login" />
                <a href="register.php" id="signup">Don't Have an Account?</a>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con->query("SELECT * FROM users WHERE username = '$username'");

        if (mysqli_num_rows($result) === 1) {
            $data = mysqli_fetch_assoc($result);
            if (password_verify($password, $data['password'])) {

                if ($data['role'] == 1) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['login'] = true;

                    $sesi = $_SESSION['username'];
                    echo "<script>alert('Selamat Datang, $sesi');</script>";
                    echo "<script>window.location.replace('admin/index.php');</script>";
                    return;
                } else {
                    $_SESSION['id'] = $data['user_id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['emai'] = $data['email'];
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['login'] = true;
                    
                    echo "<script>alert('Berhasil Login');</script>";
                    $sesi = $_SESSION['username'];
                    echo "<script>alert('Selamat Datang, $sesi');</script>";
                    echo "<script>window.location.replace('web/index.php');</script>";
                }
            } else {
                echo "<script>alert('Password Salah');</script>";
                echo "<script>window.location.replace('login.php');</script>";
            }
        } else {
            echo "<script>alert('Gagal Login')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }
    }

    ?>
</body>
</html>