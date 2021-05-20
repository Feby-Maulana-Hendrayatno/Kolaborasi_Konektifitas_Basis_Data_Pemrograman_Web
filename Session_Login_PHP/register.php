<?php
    $con = new mysqli("localhost", "root", "", "login"); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
</head>
<body>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>Registrasi</h2>
            </div>
            <form method="POST" class="form">
                <label style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input class="form-content" type="text" name="username" />
                <div class="form-border"></div>
                <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
                <input class="form-content" type="email" name="email" autocomplete="on" required />
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
                <input class="form-content" type="password" name="password"/>
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;Konfirmasi Password</label>
                <input class="form-content" type="password" name="confirm_password" />
                <div class="form-border"></div>
                <a href="#">
                    <legend id="forgot-pass">Forgot password?</legend>
                </a>
                <input id="submit-btn" type="submit" name="btn-register"/>
                <a href="login.php" id="signup">Already Have an Account?</a>
            </form>
        </div>
    </div>

    
    <?php
        if (isset($_POST["btn-register"])) {
            
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = mysqli_real_escape_string($con,  $_POST['password']);
            $confirm_password = mysqli_real_escape_string($con,  $_POST['confirm_password']);
            
            $result = $con->query("SELECT username FROM tb_login WHERE username = '$username'");

            if (mysqli_fetch_assoc($result) > 0) {
                echo "<script>alert('Username Telah Terdaftar');</script>";
            }

        if ($password !== $confirm_password) {
            echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $con->query("INSERT INTO tb_login VALUES('', '$username', '$password', '$email')");

        if ($query !=0) {
            echo "<script>alert('Berhasil')</script>";
            echo "<script>window.location.replace('login.php');</script>";
        }else{
            echo "<script>alert('Gagal')</script>";
            echo "<script>window.location.replace('register.php');</script>";
        }
    }
    ?>
</body>
</html>