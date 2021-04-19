<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/reset.css">
    <link rel="stylesheet" href="./public/css/global.css">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="./public/css/layout.css">

    <link rel="stylesheet" href="./public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/fonts/aizo-icon.css">
    <title>Document</title>
</head>

<body>
    <div id="app">
        <div id="login-box">
            <div class="left">
                <form action="" method="POST" class="form-login">
                    <h1>Đăng nhập</h1>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Tên đăng nhập" autocomplete="off" spellcheck="false" value="<?php echo set_value("username") ?>">
                        <?php echo form_error("username"); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Mật khẩu đăng nhập" autocomplete="off" spellcheck="false">
                        <?php echo form_error("password"); ?>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" id="remember-me" placeholder="Nhớ cho lần đăng nhập tới" autocomplete="off" spellcheck="false">
                        <label for="remember-me">Lưu đăng nhập</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup_submit" value="Sign me up">Đăng Nhập</button>
                        <?php echo form_error("loginProcess"); ?>
                    </div>
                    <a href="" class="lost-pass-view">Quên mật khẩu ?</a>
                </form>
            </div>
            <div class="right">
                <span class="loginwith">Welcome to<br>CAPRI</span>
            </div>
            <div class="or">OR</div>
        </div>
    </div>
</body>

</html>