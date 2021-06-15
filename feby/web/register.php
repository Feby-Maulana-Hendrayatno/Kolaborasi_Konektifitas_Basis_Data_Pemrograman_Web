<?php
    session_start();
    include '../config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        a {
    text-decoration: none;
}

body {
    background: -webkit-linear-gradient(bottom, #5bd64b, #a6f77b);
    background-repeat: no-repeat;
}

label {
    font-family: "Raleway", sans-serif;
    font-size: 11pt;
}

#forgot-pass {
    color: #60d6d0;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 3px;
    text-align: right;
}

#card {
    background: #fbfbfb;
    border-radius: 8px;
    box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
    height: 430px;
    margin: 6rem auto 8.1rem auto;
    width: 350px;
}

#card-content {
    padding: 12px 44px;
}

#card-title {
    font-family: "Raleway Thin", sans-serif;
    letter-spacing: 4px;
    padding-bottom: 23px;
    padding-top: 13px;
    text-align: center;
}

#signup {
    color: #2dbd6e;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 16px;
    text-align: center;
}

#submit-btn {
    background: -webkit-linear-gradient(right, #a6f77b, #2dbd6e);
    border: none;
    border-radius: 21px;
    box-shadow: 0px 1px 8px #24c64f;
    cursor: pointer;
    color: white;
    font-family: "Raleway SemiBold", sans-serif;
    height: 42.3px;
    margin: 0 auto;
    margin-top: 50px;
    transition: 0.25s;
    width: 153px;
}

#submit-btn:hover {
    box-shadow: 0px 1px 18px #24c64f;
}

.form {
    align-items: left;
    display: flex;
    flex-direction: column;
}

.form-border {
    background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
    height: 1px;
    width: 100%;
}

.form-content {
    background: #fbfbfb;
    border: none;
    outline: none;
    padding-top: 14px;
}

.underline-title .buton {
    background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
    height: 2px;
    margin: -1.1rem auto 0 auto;
    width: 89px;
}
    </style>
</head>
<body>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>Register</h2>
                <div class="underline-title"></div>
            </div>
            <form method="POST" class="form">
                <label style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input class="form-content" type="text" name="nama_pelanggan" />
                <div class="form-border"></div>
                <label style="padding-top:22px">&nbsp;Password Pelanggan
                </label>
                <input class="form-content" type="password" name="email_pelanggan"/>
                <div class="form-border"></div>
                <label style="padding-top:22px">&nbsp;konfirmasi Password Pelanggan
                </label>
                <input class="form-content" type="password" name="password_pelanggan"/>
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
        if (isset($_POST['btn-login'])) {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $email_pelanggan = $_POST['email_pelanggan'];
            $password_pelanggan = $_POST['password_pelanggan'];

            $password_pelanggan = password_hash($password_pelanggan, PASSWORD_DEFAULT);

            $query = $koneksi->query("INSERT INTO pelanggan VALUES ('', '$nama_pelanggan', '$email_pelanggan', '$password_pelanggan') ");

            if ($query != 0) {
                echo "<script>alert('Data Berhasil di Buat');</script>";
                echo "<script>window.location.replace('login.php');</script>";
                exit;
            } else {
                echo "<script>alert('Data Gagal di Buat');</script>";
                echo "<script>window.location.replace('register.php');</script>";
                exit;
            }
        }
    ?>



</body>
</html>