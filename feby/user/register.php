<?php
    $con = new mysqli("localhost", "root", "", "angkringan-family"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style-registrasi.css">
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
                <input class="form-content" type="email" name="email"/>
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
                <input class="form-content" type="password" name="password"/>
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;Konfirmasi Password</label>
                <input class="form-content" type="password" name="confirm_password" />
                <div class="form-border"></div>
                <!-- <label for="user-role" style="padding-top:22px">&nbsp;Role</label>
                <select  name="role" >
                    <option value="pembeli">User</option>
                </select> -->
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

    if (isset($_POST['btn-register'])) {

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = $_POST['confirm_password'];

        $result = $con->query("SELECT * FROM users WHERE username = '$username' ");

        if (mysqli_fetch_assoc($result) > 0) {
            echo "<script>alert('Username Sudah Terdaftar');</script>";
            return;
        }

        if ($password !== $confirm_password) {
            echo "<script>alert('Konfirmasi Password Tidak Sesuai');</script>";
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $con->query("INSERT INTO users (username,password,email,role) VALUES('$username', '$password','$email',0)");

        if ($query) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>window.location.replace('login.php');</script>";
        } else {
            echo "<script>alert('Gagal');</script>";
            echo "<script>window.location.replace('register.php');</script>";
        }
    }

    ?>
</body>
</html>