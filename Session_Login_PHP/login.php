<?php
    session_start();
    if (isset($_SESSION['login'])) {
        echo "<script>alert('Logout dahulu');</script>";
        echo "<script>window.location.replace('index.php');</script>";            
        
    }

    $con = new mysqli("localhost", "root", "", "login"); ?>

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
                <a href="register.php" id="signup">Don't have account yet?</a>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["btn-login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $con->query("SELECT * from tb_login where username = '$username' ");
    
        if (mysqli_num_rows($result) === 1) {

            $data = mysqli_fetch_assoc($result);

            if (password_verify($password, $data['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            echo "<script>alert('Berhasil Login');</script>";
            echo "<script>window.location.replace('index.php');</script>";

        }else{
            echo "<script>alert('Gagal Login');</script>";
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